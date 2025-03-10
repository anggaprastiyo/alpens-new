<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyBiayaDetailRequest;
use App\Http\Requests\StoreBiayaDetailRequest;
use App\Http\Requests\UpdateBiayaDetailRequest;
use App\Models\Biaya;
use App\Models\BiayaDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BiayaDetailController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('biaya_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biayaDetails = BiayaDetail::with(['biaya'])->get();

        return view('admin.biayaDetails.index', compact('biayaDetails'));
    }

    public function create()
    {
        abort_if(Gate::denies('biaya_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biayas = Biaya::pluck('nama', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.biayaDetails.create', compact('biayas'));
    }

    public function store(StoreBiayaDetailRequest $request)
    {
        $biayaDetail = BiayaDetail::create($request->all());

        return redirect()->route('admin.biaya-details.index');
    }

    public function edit(BiayaDetail $biayaDetail)
    {
        abort_if(Gate::denies('biaya_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biayaDetail->load('biaya');

        return view('admin.biayaDetails.edit', compact('biayaDetail'));
    }

    public function update(UpdateBiayaDetailRequest $request, BiayaDetail $biayaDetail)
    {
        $biayaDetail->update($request->all());

        return redirect()->route('admin.biaya-details.index');
    }

    public function show(BiayaDetail $biayaDetail)
    {
        abort_if(Gate::denies('biaya_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biayaDetail->load('biaya');

        return view('admin.biayaDetails.show', compact('biayaDetail'));
    }

    public function destroy(BiayaDetail $biayaDetail)
    {
        abort_if(Gate::denies('biaya_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biayaDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyBiayaDetailRequest $request)
    {
        $biayaDetails = BiayaDetail::find(request('ids'));

        foreach ($biayaDetails as $biayaDetail) {
            $biayaDetail->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
