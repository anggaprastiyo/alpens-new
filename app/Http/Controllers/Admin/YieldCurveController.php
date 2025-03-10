<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyYieldCurveRequest;
use App\Http\Requests\StoreYieldCurveRequest;
use App\Http\Requests\UpdateYieldCurveRequest;
use App\Models\YieldCurve;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class YieldCurveController extends Controller
{
    use MediaUploadingTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('yield_curve_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = YieldCurve::query()->select(sprintf('%s.*', (new YieldCurve)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'yield_curve_show';
                $editGate = 'yield_curve_edit';
                $deleteGate = 'yield_curve_delete';
                $crudRoutePart = 'yield-curves';

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
            $table->editColumn('version_name', function ($row) {
                return $row->version_name ? $row->version_name : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.yieldCurves.index');
    }

    public function create()
    {
        abort_if(Gate::denies('yield_curve_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.yieldCurves.create');
    }

    public function store(StoreYieldCurveRequest $request)
    {
        $yieldCurve = YieldCurve::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $yieldCurve->id]);
        }

        return redirect()->route('admin.yield-curves.index');
    }

    public function edit($id)
    {
        $yieldCurve = YieldCurve::find($id);
        abort_if(Gate::denies('yield_curve_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.yieldCurves.edit', compact('yieldCurve'));
    }

    public function update(UpdateYieldCurveRequest $request, $id)
    {
        $yieldCurve = YieldCurve::find($id);
        $yieldCurve->update($request->all());

        return redirect()->route('admin.yield-curves.index');
    }

    public function show($id)
    {
        $yieldCurve = YieldCurve::find($id);
        abort_if(Gate::denies('yield_curve_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.yieldCurves.show', compact('yieldCurve'));
    }

    public function destroy($id)
    {
        $yieldCurve = YieldCurve::find($id);
        abort_if(Gate::denies('yield_curve_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $yieldCurve->delete();

        return back();
    }

    public function massDestroy(MassDestroyYieldCurveRequest $request)
    {
        $yieldCurves = YieldCurve::find(request('ids'));

        foreach ($yieldCurves as $yieldCurve) {
            $yieldCurve->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('yield_curve_create') && Gate::denies('yield_curve_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model = new YieldCurve;
        $model->id = $request->input('crud_id', 0);
        $model->exists = true;
        $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
