<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyReksadanaRequest;
use App\Http\Requests\StoreReksadanaRequest;
use App\Http\Requests\UpdateReksadanaRequest;
use App\Models\AssetMigration;
use App\Models\Reksadana;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ReksadanaController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('reksadana_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reksadanas = Reksadana::with(['asset_migration'])->get();

        $asset_migrations = AssetMigration::get();

        return view('admin.reksadanas.index', compact('asset_migrations', 'reksadanas'));
    }

    public function create()
    {
        abort_if(Gate::denies('reksadana_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset_migrations = AssetMigration::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.reksadanas.create', compact('asset_migrations'));
    }

    public function store(StoreReksadanaRequest $request)
    {
        $reksadana = Reksadana::create($request->all());

        return redirect()->route('admin.reksadanas.index');
    }

    public function edit(Reksadana $reksadana)
    {
        abort_if(Gate::denies('reksadana_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset_migrations = AssetMigration::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $reksadana->load('asset_migration');

        return view('admin.reksadanas.edit', compact('asset_migrations', 'reksadana'));
    }

    public function update(UpdateReksadanaRequest $request, Reksadana $reksadana)
    {
        $reksadana->update($request->all());

        return redirect()->route('admin.reksadanas.index');
    }

    public function show(Reksadana $reksadana)
    {
        abort_if(Gate::denies('reksadana_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reksadana->load('asset_migration');

        return view('admin.reksadanas.show', compact('reksadana'));
    }

    public function destroy(Reksadana $reksadana)
    {
        abort_if(Gate::denies('reksadana_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $reksadana->delete();

        return back();
    }

    public function massDestroy(MassDestroyReksadanaRequest $request)
    {
        $reksadanas = Reksadana::find(request('ids'));

        foreach ($reksadanas as $reksadana) {
            $reksadana->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
