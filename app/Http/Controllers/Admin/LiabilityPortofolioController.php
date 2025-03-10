<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyLiabilityPortofolioRequest;
use App\Http\Requests\StoreLiabilityPortofolioRequest;
use App\Http\Requests\UpdateLiabilityPortofolioRequest;
use App\Models\Biaya;
use App\Models\LiabilityPortofolio;
use App\Models\YieldCurve;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LiabilityPortofolioController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('liability_portofolio_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = LiabilityPortofolio::with(['biaya', 'yield_curve'])->select(sprintf('%s.*', (new LiabilityPortofolio)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'liability_portofolio_show';
                $editGate      = 'liability_portofolio_edit';
                $deleteGate    = 'liability_portofolio_delete';
                $crudRoutePart = 'liability-portofolios';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->addColumn('biaya_name', function ($row) {
                return $row->biaya ? $row->biaya->name : '';
            });

            $table->addColumn('yield_curve_version_name', function ($row) {
                return $row->yield_curve ? $row->yield_curve->version_name : '';
            });

            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('description', function ($row) {
                return $row->description ? $row->description : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'biaya', 'yield_curve']);

            return $table->make(true);
        }

        $biayas       = Biaya::get();
        $yield_curves = YieldCurve::get();

        return view('admin.liabilityPortofolios.index', compact('biayas', 'yield_curves'));
    }

    public function create()
    {
        abort_if(Gate::denies('liability_portofolio_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biayas = Biaya::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $yield_curves = YieldCurve::pluck('version_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.liabilityPortofolios.create', compact('biayas', 'yield_curves'));
    }

    public function store(StoreLiabilityPortofolioRequest $request)
    {
        $liabilityPortofolio = LiabilityPortofolio::create($request->all());

        return redirect()->route('admin.liability-portofolios.index');
    }

    public function edit(LiabilityPortofolio $liabilityPortofolio)
    {
        abort_if(Gate::denies('liability_portofolio_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biayas = Biaya::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $yield_curves = YieldCurve::pluck('version_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $liabilityPortofolio->load('biaya', 'yield_curve');

        return view('admin.liabilityPortofolios.edit', compact('biayas', 'liabilityPortofolio', 'yield_curves'));
    }

    public function update(UpdateLiabilityPortofolioRequest $request, LiabilityPortofolio $liabilityPortofolio)
    {
        $liabilityPortofolio->update($request->all());

        return redirect()->route('admin.liability-portofolios.index');
    }

    public function show(LiabilityPortofolio $liabilityPortofolio)
    {
        abort_if(Gate::denies('liability_portofolio_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityPortofolio->load('biaya', 'yield_curve');

        return view('admin.liabilityPortofolios.show', compact('liabilityPortofolio'));
    }

    public function destroy(LiabilityPortofolio $liabilityPortofolio)
    {
        abort_if(Gate::denies('liability_portofolio_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityPortofolio->delete();

        return back();
    }

    public function massDestroy(MassDestroyLiabilityPortofolioRequest $request)
    {
        $liabilityPortofolios = LiabilityPortofolio::find(request('ids'));

        foreach ($liabilityPortofolios as $liabilityPortofolio) {
            $liabilityPortofolio->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
