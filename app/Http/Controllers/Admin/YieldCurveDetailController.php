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
use Yajra\DataTables\Facades\DataTables;

class YieldCurveDetailController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('yield_curve_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = YieldCurveDetail::with(['yield_curve'])->select(sprintf('%s.*', (new YieldCurveDetail)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'yield_curve_detail_show';
                $editGate      = 'yield_curve_detail_edit';
                $deleteGate    = 'yield_curve_detail_delete';
                $crudRoutePart = 'yield-curve-details';

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
            $table->addColumn('yield_curve_version_name', function ($row) {
                return $row->yield_curve ? $row->yield_curve->version_name : '';
            });

            $table->editColumn('tenor_year', function ($row) {
                return $row->tenor_year ? $row->tenor_year : '';
            });
            $table->editColumn('today', function ($row) {
                return $row->today ? $row->today : '';
            });
            $table->editColumn('change_bps', function ($row) {
                return $row->change_bps ? $row->change_bps : '';
            });
            $table->editColumn('yesterday_yield', function ($row) {
                return $row->yesterday_yield ? $row->yesterday_yield : '';
            });
            $table->editColumn('lastweek_yield', function ($row) {
                return $row->lastweek_yield ? $row->lastweek_yield : '';
            });
            $table->editColumn('lastmonth_yield', function ($row) {
                return $row->lastmonth_yield ? $row->lastmonth_yield : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'yield_curve']);

            return $table->make(true);
        }

        return view('admin.yieldCurveDetails.index');
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
