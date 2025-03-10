<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyLiabilityJkkRequest;
use App\Http\Requests\StoreLiabilityJkkRequest;
use App\Http\Requests\UpdateLiabilityJkkRequest;
use App\Models\LiabilityJkk;
use App\Models\LiabilityPortofolio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LiabilityJkkController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('liability_jkk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityJkks = LiabilityJkk::with(['liability_portofolio'])->get();

        return view('admin.liabilityJkks.index', compact('liabilityJkks'));
    }

    public function create()
    {
        abort_if(Gate::denies('liability_jkk_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liability_portofolios = LiabilityPortofolio::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.liabilityJkks.create', compact('liability_portofolios'));
    }

    public function store(StoreLiabilityJkkRequest $request)
    {
        $liabilityJkk = LiabilityJkk::create($request->all());

        return redirect()->route('admin.liability-jkks.index');
    }

    public function edit(LiabilityJkk $liabilityJkk)
    {
        abort_if(Gate::denies('liability_jkk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liability_portofolios = LiabilityPortofolio::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $liabilityJkk->load('liability_portofolio');

        return view('admin.liabilityJkks.edit', compact('liabilityJkk', 'liability_portofolios'));
    }

    public function update(UpdateLiabilityJkkRequest $request, LiabilityJkk $liabilityJkk)
    {
        $liabilityJkk->update($request->all());

        return redirect()->route('admin.liability-jkks.index');
    }

    public function show(LiabilityJkk $liabilityJkk)
    {
        abort_if(Gate::denies('liability_jkk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityJkk->load('liability_portofolio');

        return view('admin.liabilityJkks.show', compact('liabilityJkk'));
    }

    public function destroy(LiabilityJkk $liabilityJkk)
    {
        abort_if(Gate::denies('liability_jkk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityJkk->delete();

        return back();
    }

    public function massDestroy(MassDestroyLiabilityJkkRequest $request)
    {
        $liabilityJkks = LiabilityJkk::find(request('ids'));

        foreach ($liabilityJkks as $liabilityJkk) {
            $liabilityJkk->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
