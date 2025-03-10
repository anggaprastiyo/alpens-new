<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBopRequest;
use App\Http\Requests\StoreBopRequest;
use App\Http\Requests\UpdateBopRequest;
use App\Models\Bop;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BopController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('bop_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Bop::query()->select(sprintf('%s.*', (new Bop)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'bop_show';
                $editGate      = 'bop_edit';
                $deleteGate    = 'bop_delete';
                $crudRoutePart = 'bops';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.bops.index');
    }

    public function create()
    {
        abort_if(Gate::denies('bop_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bops.create');
    }

    public function store(StoreBopRequest $request)
    {
        $bop = Bop::create($request->all());

        if ($request->input('source_file', false)) {
            $bop->addMedia(storage_path('tmp/uploads/' . basename($request->input('source_file'))))->toMediaCollection('source_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $bop->id]);
        }

        return redirect()->route('admin.bops.index');
    }

    public function edit(Bop $bop)
    {
        abort_if(Gate::denies('bop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bops.edit', compact('bop'));
    }

    public function update(UpdateBopRequest $request, Bop $bop)
    {
        $bop->update($request->all());

        if ($request->input('source_file', false)) {
            if (! $bop->source_file || $request->input('source_file') !== $bop->source_file->file_name) {
                if ($bop->source_file) {
                    $bop->source_file->delete();
                }
                $bop->addMedia(storage_path('tmp/uploads/' . basename($request->input('source_file'))))->toMediaCollection('source_file');
            }
        } elseif ($bop->source_file) {
            $bop->source_file->delete();
        }

        return redirect()->route('admin.bops.index');
    }

    public function show(Bop $bop)
    {
        abort_if(Gate::denies('bop_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bops.show', compact('bop'));
    }

    public function destroy(Bop $bop)
    {
        abort_if(Gate::denies('bop_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bop->delete();

        return back();
    }

    public function massDestroy(MassDestroyBopRequest $request)
    {
        $bops = Bop::find(request('ids'));

        foreach ($bops as $bop) {
            $bop->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('bop_create') && Gate::denies('bop_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Bop();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
