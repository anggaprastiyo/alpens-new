<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyYieldCurveDetailRequest;
use App\Http\Requests\StoreYieldCurveDetailRequest;
use App\Http\Requests\UpdateYieldCurveDetailRequest;
use App\Models\YieldCurve;
use App\Models\YieldCurveDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class YieldCurveDetailController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('yield_curve_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $yieldCurveDetails = YieldCurveDetail::with(['yield_curve'])->get();

        return view('admin.yieldCurveDetails.index', compact('yieldCurveDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('yield_curve_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $yield_curves = YieldCurve::pluck('version_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.yieldCurveDetails.create', compact('yield_curves'));
    }

    public function store(StoreYieldCurveDetailRequest $request)
    {
        $yieldCurveDetail = YieldCurveDetail::create($request->all());

        return redirect()->route('admin.yield-curve-details.index');
    }

    public function edit(YieldCurveDetail $yieldCurveDetail)
    {
        abort_if(Gate::denies('yield_curve_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $yield_curves = YieldCurve::pluck('version_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $yieldCurveDetail->load('yield_curve');

        return view('admin.yieldCurveDetails.edit', compact('yieldCurveDetail', 'yield_curves'));
    }

    public function update(UpdateYieldCurveDetailRequest $request, YieldCurveDetail $yieldCurveDetail)
    {
        $yieldCurveDetail->update($request->all());

        return redirect()->route('admin.yield-curve-details.index');
    }

    public function show(YieldCurveDetail $yieldCurveDetail)
    {
        abort_if(Gate::denies('yield_curve_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $yieldCurveDetail->load('yield_curve');

        return view('admin.yieldCurveDetails.show', compact('yieldCurveDetail'));
    }

    public function destroy(YieldCurveDetail $yieldCurveDetail)
    {
        abort_if(Gate::denies('yield_curve_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $yieldCurveDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyYieldCurveDetailRequest $request)
    {
        $yieldCurveDetails = YieldCurveDetail::find(request('ids'));

        foreach ($yieldCurveDetails as $yieldCurveDetail) {
            $yieldCurveDetail->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
