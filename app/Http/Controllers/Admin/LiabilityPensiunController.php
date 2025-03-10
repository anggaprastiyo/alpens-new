<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLiabilityPensiunRequest;
use App\Http\Requests\StoreLiabilityPensiunRequest;
use App\Http\Requests\UpdateLiabilityPensiunRequest;
use App\Models\LiabilityPensiun;
use App\Models\LiabilityPortofolio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LiabilityPensiunController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('liability_pensiun_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityPensiuns = LiabilityPensiun::with(['liability_portofolio'])->get();

        return view('admin.liabilityPensiuns.index', compact('liabilityPensiuns'));
    }

    public function create()
    {
        abort_if(Gate::denies('liability_pensiun_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liability_portofolios = LiabilityPortofolio::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.liabilityPensiuns.create', compact('liability_portofolios'));
    }

    public function store(StoreLiabilityPensiunRequest $request)
    {
        $liabilityPensiun = LiabilityPensiun::create($request->all());

        return redirect()->route('admin.liability-pensiuns.index');
    }

    public function edit(LiabilityPensiun $liabilityPensiun)
    {
        abort_if(Gate::denies('liability_pensiun_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liability_portofolios = LiabilityPortofolio::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $liabilityPensiun->load('liability_portofolio');

        return view('admin.liabilityPensiuns.edit', compact('liabilityPensiun', 'liability_portofolios'));
    }

    public function update(UpdateLiabilityPensiunRequest $request, LiabilityPensiun $liabilityPensiun)
    {
        $liabilityPensiun->update($request->all());

        return redirect()->route('admin.liability-pensiuns.index');
    }

    public function show(LiabilityPensiun $liabilityPensiun)
    {
        abort_if(Gate::denies('liability_pensiun_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityPensiun->load('liability_portofolio');

        return view('admin.liabilityPensiuns.show', compact('liabilityPensiun'));
    }

    public function destroy(LiabilityPensiun $liabilityPensiun)
    {
        abort_if(Gate::denies('liability_pensiun_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityPensiun->delete();

        return back();
    }

    public function massDestroy(MassDestroyLiabilityPensiunRequest $request)
    {
        $liabilityPensiuns = LiabilityPensiun::find(request('ids'));

        foreach ($liabilityPensiuns as $liabilityPensiun) {
            $liabilityPensiun->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
