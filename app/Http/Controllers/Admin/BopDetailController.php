<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyBopDetailRequest;
use App\Http\Requests\StoreBopDetailRequest;
use App\Http\Requests\UpdateBopDetailRequest;
use App\Models\Bop;
use App\Models\BopDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BopDetailController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('bop_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bop = Bop::find($request->input('id'));
        $bopDetails = BopDetail::with(['bop'])
            ->where('bop_id', $request->input('id'))
            ->get();

        return view('admin.bopDetails.index', compact('bopDetails', 'bop'));
    }

    public function create(Request $request)
    {
        abort_if(Gate::denies('bop_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bops = Bop::where('id', $request->input('id'))->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bopDetails.create', compact('bops'));
    }

    public function store(StoreBopDetailRequest $request)
    {
        $bopDetail = BopDetail::create($request->all());

        return redirect()->route('admin.bop-details.index', ['id' => $request->input('bop_id')]);
    }

    public function edit(BopDetail $bopDetail)
    {
        abort_if(Gate::denies('bop_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bops = Bop::where('id', $bopDetail->bop_id)->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');
        $bopDetail->load('bop');

        return view('admin.bopDetails.edit', compact('bopDetail', 'bops'));
    }

    public function update(UpdateBopDetailRequest $request, BopDetail $bopDetail)
    {
        $bopDetail->update($request->all());

        return redirect()->route('admin.bop-details.index', ['id' => $request->input('bop_id')]);
    }

    public function show(BopDetail $bopDetail)
    {
        abort_if(Gate::denies('bop_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bopDetail->load('bop');

        return view('admin.bopDetails.show', compact('bopDetail'));
    }

    public function destroy(BopDetail $bopDetail)
    {
        abort_if(Gate::denies('bop_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bopDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyBopDetailRequest $request)
    {
        $bopDetails = BopDetail::find(request('ids'));

        foreach ($bopDetails as $bopDetail) {
            $bopDetail->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
