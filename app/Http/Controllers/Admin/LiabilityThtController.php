<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyLiabilityThtRequest;
use App\Http\Requests\StoreLiabilityThtRequest;
use App\Http\Requests\UpdateLiabilityThtRequest;
use App\Models\LiabilityPortofolio;
use App\Models\LiabilityTht;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LiabilityThtController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('liability_tht_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityThts = LiabilityTht::with(['liability_portofolio'])->get();

        return view('admin.liabilityThts.index', compact('liabilityThts'));
    }

    public function create()
    {
        abort_if(Gate::denies('liability_tht_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liability_portofolios = LiabilityPortofolio::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.liabilityThts.create', compact('liability_portofolios'));
    }

    public function store(StoreLiabilityThtRequest $request)
    {
        $liabilityTht = LiabilityTht::create($request->all());

        return redirect()->route('admin.liability-thts.index');
    }

    public function edit(LiabilityTht $liabilityTht)
    {
        abort_if(Gate::denies('liability_tht_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liability_portofolios = LiabilityPortofolio::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $liabilityTht->load('liability_portofolio');

        return view('admin.liabilityThts.edit', compact('liabilityTht', 'liability_portofolios'));
    }

    public function update(UpdateLiabilityThtRequest $request, LiabilityTht $liabilityTht)
    {
        $liabilityTht->update($request->all());

        return redirect()->route('admin.liability-thts.index');
    }

    public function show(LiabilityTht $liabilityTht)
    {
        abort_if(Gate::denies('liability_tht_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityTht->load('liability_portofolio');

        return view('admin.liabilityThts.show', compact('liabilityTht'));
    }

    public function destroy(LiabilityTht $liabilityTht)
    {
        abort_if(Gate::denies('liability_tht_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityTht->delete();

        return back();
    }

    public function massDestroy(MassDestroyLiabilityThtRequest $request)
    {
        $liabilityThts = LiabilityTht::find(request('ids'));

        foreach ($liabilityThts as $liabilityTht) {
            $liabilityTht->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
