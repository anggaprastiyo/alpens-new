<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDataSapDetailRequest;
use App\Http\Requests\StoreDataSapDetailRequest;
use App\Http\Requests\UpdateDataSapDetailRequest;
use App\Models\DataSap;
use App\Models\DataSapDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DataSapDetailController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('data_sap_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = DataSapDetail::with(['data_sap'])->select(sprintf('%s.*', (new DataSapDetail)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'data_sap_detail_show';
                $editGate      = 'data_sap_detail_edit';
                $deleteGate    = 'data_sap_detail_delete';
                $crudRoutePart = 'data-sap-details';

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
            $table->addColumn('data_sap_name', function ($row) {
                return $row->data_sap ? $row->data_sap->name : '';
            });

            $table->editColumn('jenis_program', function ($row) {
                return $row->jenis_program ? $row->jenis_program : '';
            });
            $table->editColumn('item', function ($row) {
                return $row->item ? $row->item : '';
            });
            $table->editColumn('nominal', function ($row) {
                return $row->nominal ? $row->nominal : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'data_sap']);

            return $table->make(true);
        }

        return view('admin.dataSapDetails.index');
    }

    public function create()
    {
        abort_if(Gate::denies('data_sap_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data_saps = DataSap::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dataSapDetails.create', compact('data_saps'));
    }

    public function store(StoreDataSapDetailRequest $request)
    {
        $dataSapDetail = DataSapDetail::create($request->all());

        return redirect()->route('admin.data-sap-details.index');
    }

    public function edit(DataSapDetail $dataSapDetail)
    {
        abort_if(Gate::denies('data_sap_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data_saps = DataSap::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $dataSapDetail->load('data_sap');

        return view('admin.dataSapDetails.edit', compact('dataSapDetail', 'data_saps'));
    }

    public function update(UpdateDataSapDetailRequest $request, DataSapDetail $dataSapDetail)
    {
        $dataSapDetail->update($request->all());

        return redirect()->route('admin.data-sap-details.index');
    }

    public function show(DataSapDetail $dataSapDetail)
    {
        abort_if(Gate::denies('data_sap_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataSapDetail->load('data_sap');

        return view('admin.dataSapDetails.show', compact('dataSapDetail'));
    }

    public function destroy(DataSapDetail $dataSapDetail)
    {
        abort_if(Gate::denies('data_sap_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataSapDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyDataSapDetailRequest $request)
    {
        $dataSapDetails = DataSapDetail::find(request('ids'));

        foreach ($dataSapDetails as $dataSapDetail) {
            $dataSapDetail->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
