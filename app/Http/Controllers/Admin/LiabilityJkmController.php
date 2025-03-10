<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyLiabilityJkmRequest;
use App\Http\Requests\StoreLiabilityJkmRequest;
use App\Http\Requests\UpdateLiabilityJkmRequest;
use App\Models\LiabilityJkm;
use App\Models\LiabilityPortofolio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LiabilityJkmController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('liability_jkm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityJkms = LiabilityJkm::with(['liability_portofolio'])->get();

        return view('admin.liabilityJkms.index', compact('liabilityJkms'));
    }

    public function create()
    {
        abort_if(Gate::denies('liability_jkm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liability_portofolios = LiabilityPortofolio::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.liabilityJkms.create', compact('liability_portofolios'));
    }

    public function store(StoreLiabilityJkmRequest $request)
    {
        $liabilityJkm = LiabilityJkm::create($request->all());

        return redirect()->route('admin.liability-jkms.index');
    }

    public function edit(LiabilityJkm $liabilityJkm)
    {
        abort_if(Gate::denies('liability_jkm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liability_portofolios = LiabilityPortofolio::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $liabilityJkm->load('liability_portofolio');

        return view('admin.liabilityJkms.edit', compact('liabilityJkm', 'liability_portofolios'));
    }

    public function update(UpdateLiabilityJkmRequest $request, LiabilityJkm $liabilityJkm)
    {
        $liabilityJkm->update($request->all());

        return redirect()->route('admin.liability-jkms.index');
    }

    public function show(LiabilityJkm $liabilityJkm)
    {
        abort_if(Gate::denies('liability_jkm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityJkm->load('liability_portofolio');

        return view('admin.liabilityJkms.show', compact('liabilityJkm'));
    }

    public function destroy(LiabilityJkm $liabilityJkm)
    {
        abort_if(Gate::denies('liability_jkm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityJkm->delete();

        return back();
    }

    public function massDestroy(MassDestroyLiabilityJkmRequest $request)
    {
        $liabilityJkms = LiabilityJkm::find(request('ids'));

        foreach ($liabilityJkms as $liabilityJkm) {
            $liabilityJkm->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
