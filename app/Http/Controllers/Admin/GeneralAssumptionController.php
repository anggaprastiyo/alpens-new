<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyGeneralAssumptionRequest;
use App\Http\Requests\StoreGeneralAssumptionRequest;
use App\Http\Requests\UpdateGeneralAssumptionRequest;
use App\Models\GeneralAssumption;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class GeneralAssumptionController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('general_assumption_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = GeneralAssumption::query()->select(sprintf('%s.*', (new GeneralAssumption)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'general_assumption_show';
                $editGate      = 'general_assumption_edit';
                $deleteGate    = 'general_assumption_delete';
                $crudRoutePart = 'general-assumptions';

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
            $table->editColumn('tahun_awal_proyeksi', function ($row) {
                return $row->tahun_awal_proyeksi ? $row->tahun_awal_proyeksi : '';
            });
            $table->editColumn('tahun_akhir_proyeksi', function ($row) {
                return $row->tahun_akhir_proyeksi ? $row->tahun_akhir_proyeksi : '';
            });
            $table->editColumn('pajak_atas_kupon_obligasi', function ($row) {
                return $row->pajak_atas_kupon_obligasi ? $row->pajak_atas_kupon_obligasi : '';
            });
            $table->editColumn('pajak_atas_bunga_deposito', function ($row) {
                return $row->pajak_atas_bunga_deposito ? $row->pajak_atas_bunga_deposito : '';
            });
            $table->editColumn('kenaikan_bop_pertahun', function ($row) {
                return $row->kenaikan_bop_pertahun ? $row->kenaikan_bop_pertahun : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.generalAssumptions.index');
    }

    public function create()
    {
        abort_if(Gate::denies('general_assumption_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.generalAssumptions.create');
    }

    public function store(StoreGeneralAssumptionRequest $request)
    {
        $generalAssumption = GeneralAssumption::create($request->all());

        return redirect()->route('admin.general-assumptions.index');
    }

    public function edit(GeneralAssumption $generalAssumption)
    {
        abort_if(Gate::denies('general_assumption_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.generalAssumptions.edit', compact('generalAssumption'));
    }

    public function update(UpdateGeneralAssumptionRequest $request, GeneralAssumption $generalAssumption)
    {
        $generalAssumption->update($request->all());

        return redirect()->route('admin.general-assumptions.index');
    }

    public function show(GeneralAssumption $generalAssumption)
    {
        abort_if(Gate::denies('general_assumption_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.generalAssumptions.show', compact('generalAssumption'));
    }

    public function destroy(GeneralAssumption $generalAssumption)
    {
        abort_if(Gate::denies('general_assumption_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $generalAssumption->delete();

        return back();
    }

    public function massDestroy(MassDestroyGeneralAssumptionRequest $request)
    {
        $generalAssumptions = GeneralAssumption::find(request('ids'));

        foreach ($generalAssumptions as $generalAssumption) {
            $generalAssumption->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
