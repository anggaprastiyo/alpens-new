<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyInvestasiLangsungRequest;
use App\Http\Requests\StoreInvestasiLangsungRequest;
use App\Http\Requests\UpdateInvestasiLangsungRequest;
use App\Models\AssetMigration;
use App\Models\InvestasiLangsung;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvestasiLangsungController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('investasi_langsung_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $investasiLangsungs = InvestasiLangsung::with(['asset_migration'])->get();

        $asset_migrations = AssetMigration::get();

        return view('admin.investasiLangsungs.index', compact('asset_migrations', 'investasiLangsungs'));
    }

    public function create()
    {
        abort_if(Gate::denies('investasi_langsung_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset_migrations = AssetMigration::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.investasiLangsungs.create', compact('asset_migrations'));
    }

    public function store(StoreInvestasiLangsungRequest $request)
    {
        $investasiLangsung = InvestasiLangsung::create($request->all());

        return redirect()->route('admin.investasi-langsungs.index');
    }

    public function edit(InvestasiLangsung $investasiLangsung)
    {
        abort_if(Gate::denies('investasi_langsung_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset_migrations = AssetMigration::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $investasiLangsung->load('asset_migration');

        return view('admin.investasiLangsungs.edit', compact('asset_migrations', 'investasiLangsung'));
    }

    public function update(UpdateInvestasiLangsungRequest $request, InvestasiLangsung $investasiLangsung)
    {
        $investasiLangsung->update($request->all());

        return redirect()->route('admin.investasi-langsungs.index');
    }

    public function show(InvestasiLangsung $investasiLangsung)
    {
        abort_if(Gate::denies('investasi_langsung_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $investasiLangsung->load('asset_migration');

        return view('admin.investasiLangsungs.show', compact('investasiLangsung'));
    }

    public function destroy(InvestasiLangsung $investasiLangsung)
    {
        abort_if(Gate::denies('investasi_langsung_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $investasiLangsung->delete();

        return back();
    }

    public function massDestroy(MassDestroyInvestasiLangsungRequest $request)
    {
        $investasiLangsungs = InvestasiLangsung::find(request('ids'));

        foreach ($investasiLangsungs as $investasiLangsung) {
            $investasiLangsung->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
