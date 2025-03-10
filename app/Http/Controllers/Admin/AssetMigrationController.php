<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAssetMigrationRequest;
use App\Http\Requests\StoreAssetMigrationRequest;
use App\Http\Requests\UpdateAssetMigrationRequest;
use App\Models\AssetMigration;
use App\Models\YieldCurve;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AssetMigrationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('asset_migration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetMigrations = AssetMigration::with(['yield_curve'])->get();

        return view('admin.assetMigrations.index', compact('assetMigrations'));
    }

    public function create()
    {
        abort_if(Gate::denies('asset_migration_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $yield_curves = YieldCurve::pluck('version_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.assetMigrations.create', compact('yield_curves'));
    }

    public function store(StoreAssetMigrationRequest $request)
    {
        $assetMigration = AssetMigration::create($request->all());

        return redirect()->route('admin.asset-migrations.index');
    }

    public function edit(AssetMigration $assetMigration)
    {
        abort_if(Gate::denies('asset_migration_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $yield_curves = YieldCurve::pluck('version_name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $assetMigration->load('yield_curve');

        return view('admin.assetMigrations.edit', compact('assetMigration', 'yield_curves'));
    }

    public function update(UpdateAssetMigrationRequest $request, AssetMigration $assetMigration)
    {
        $assetMigration->update($request->all());

        return redirect()->route('admin.asset-migrations.index');
    }

    public function show(AssetMigration $assetMigration)
    {
        abort_if(Gate::denies('asset_migration_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetMigration->load('yield_curve');

        return view('admin.assetMigrations.show', compact('assetMigration'));
    }

    public function destroy(AssetMigration $assetMigration)
    {
        abort_if(Gate::denies('asset_migration_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $assetMigration->delete();

        return back();
    }

    public function massDestroy(MassDestroyAssetMigrationRequest $request)
    {
        $assetMigrations = AssetMigration::find(request('ids'));

        foreach ($assetMigrations as $assetMigration) {
            $assetMigration->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
