<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyBiayaRequest;
use App\Http\Requests\StoreBiayaRequest;
use App\Http\Requests\UpdateBiayaRequest;
use App\Models\Biaya;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BiayaController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('biaya_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Biaya::query()->select(sprintf('%s.*', (new Biaya)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'biaya_show';
                $editGate      = 'biaya_edit';
                $deleteGate    = 'biaya_delete';
                $crudRoutePart = 'biayas';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.biayas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('biaya_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.biayas.create');
    }

    public function store(StoreBiayaRequest $request)
    {
        $biaya = Biaya::create($request->all());

        if ($request->input('source_file', false)) {
            $biaya->addMedia(storage_path('tmp/uploads/' . basename($request->input('source_file'))))->toMediaCollection('source_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $biaya->id]);
        }

        return redirect()->route('admin.biayas.index');
    }

    public function edit(Biaya $biaya)
    {
        abort_if(Gate::denies('biaya_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.biayas.edit', compact('biaya'));
    }

    public function update(UpdateBiayaRequest $request, Biaya $biaya)
    {
        $biaya->update($request->all());

        if ($request->input('source_file', false)) {
            if (! $biaya->source_file || $request->input('source_file') !== $biaya->source_file->file_name) {
                if ($biaya->source_file) {
                    $biaya->source_file->delete();
                }
                $biaya->addMedia(storage_path('tmp/uploads/' . basename($request->input('source_file'))))->toMediaCollection('source_file');
            }
        } elseif ($biaya->source_file) {
            $biaya->source_file->delete();
        }

        return redirect()->route('admin.biayas.index');
    }

    public function show(Biaya $biaya)
    {
        abort_if(Gate::denies('biaya_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.biayas.show', compact('biaya'));
    }

    public function destroy(Biaya $biaya)
    {
        abort_if(Gate::denies('biaya_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biaya->delete();

        return back();
    }

    public function massDestroy(MassDestroyBiayaRequest $request)
    {
        $biayas = Biaya::find(request('ids'));

        foreach ($biayas as $biaya) {
            $biaya->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('biaya_create') && Gate::denies('biaya_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Biaya();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
