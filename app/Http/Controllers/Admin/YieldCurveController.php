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

class YieldCurveController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('yield_curve_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $yieldCurves = YieldCurve::all();

        return view('admin.yieldCurves.index', compact('yieldCurves'));
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
        abort_if(Gate::denies('yield_curve_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $yieldCurve = YieldCurve::find($id);

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
        abort_if(Gate::denies('yield_curve_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');
        $yieldCurve = YieldCurve::find($id);

        return view('admin.yieldCurves.show', compact('yieldCurve'));
    }

    public function destroy($id)
    {
        abort_if(Gate::denies('yield_curve_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $yieldCurve = YieldCurve::find($id);
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
