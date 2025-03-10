<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDataSapRequest;
use App\Http\Requests\StoreDataSapRequest;
use App\Http\Requests\UpdateDataSapRequest;
use App\Models\DataSap;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DataSapController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('data_sap_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DataSap::query()->select(sprintf('%s.*', (new DataSap)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'data_sap_show';
                $editGate      = 'data_sap_edit';
                $deleteGate    = 'data_sap_delete';
                $crudRoutePart = 'data-saps';

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

        return view('admin.dataSaps.index');
    }

    public function create()
    {
        abort_if(Gate::denies('data_sap_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dataSaps.create');
    }

    public function store(StoreDataSapRequest $request)
    {
        $dataSap = DataSap::create($request->all());

        if ($request->input('source_file', false)) {
            $dataSap->addMedia(storage_path('tmp/uploads/' . basename($request->input('source_file'))))->toMediaCollection('source_file');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $dataSap->id]);
        }

        return redirect()->route('admin.data-saps.index');
    }

    public function edit(DataSap $dataSap)
    {
        abort_if(Gate::denies('data_sap_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dataSaps.edit', compact('dataSap'));
    }

    public function update(UpdateDataSapRequest $request, DataSap $dataSap)
    {
        $dataSap->update($request->all());

        if ($request->input('source_file', false)) {
            if (! $dataSap->source_file || $request->input('source_file') !== $dataSap->source_file->file_name) {
                if ($dataSap->source_file) {
                    $dataSap->source_file->delete();
                }
                $dataSap->addMedia(storage_path('tmp/uploads/' . basename($request->input('source_file'))))->toMediaCollection('source_file');
            }
        } elseif ($dataSap->source_file) {
            $dataSap->source_file->delete();
        }

        return redirect()->route('admin.data-saps.index');
    }

    public function show(DataSap $dataSap)
    {
        abort_if(Gate::denies('data_sap_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.dataSaps.show', compact('dataSap'));
    }

    public function destroy(DataSap $dataSap)
    {
        abort_if(Gate::denies('data_sap_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataSap->delete();

        return back();
    }

    public function massDestroy(MassDestroyDataSapRequest $request)
    {
        $dataSaps = DataSap::find(request('ids'));

        foreach ($dataSaps as $dataSap) {
            $dataSap->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('data_sap_create') && Gate::denies('data_sap_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DataSap();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
