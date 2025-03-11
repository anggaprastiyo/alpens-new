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

class DataSapDetailController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('data_sap_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $dataSap = DataSap::find($request->input('id'));
        $dataSapDetails = DataSapDetail::where('data_sap_id', $request->input('id'))->with(['data_sap'])->get();

        return view('admin.dataSapDetails.index', compact('dataSapDetails', 'dataSap'));
    }

    public function create(Request $request)
    {
        abort_if(Gate::denies('data_sap_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data_saps = DataSap::where('id', $request->input('id'))->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.dataSapDetails.create', compact('data_saps'));
    }

    public function store(StoreDataSapDetailRequest $request)
    {
        $dataSapDetail = DataSapDetail::create($request->all());

        return redirect()->route('admin.data-sap-details.index', ['id' => $request->input('data_sap_id')]);
    }

    public function edit(DataSapDetail $dataSapDetail)
    {
        abort_if(Gate::denies('data_sap_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $data_saps = DataSap::where('id', $dataSapDetail->data_sap_id)->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $dataSapDetail->load('data_sap');

        return view('admin.dataSapDetails.edit', compact('dataSapDetail', 'data_saps'));
    }

    public function update(UpdateDataSapDetailRequest $request, DataSapDetail $dataSapDetail)
    {
        $dataSapDetail->update($request->all());

        return redirect()->route('admin.data-sap-details.index', ['id' => $request->input('data_sap_id')]);
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
