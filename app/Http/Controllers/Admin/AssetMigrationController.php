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
use Yajra\DataTables\Facades\DataTables;

class AssetMigrationController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('asset_migration_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = AssetMigration::with(['yield_curve'])->select(sprintf('%s.*', (new AssetMigration)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'asset_migration_show';
                $editGate      = 'asset_migration_edit';
                $deleteGate    = 'asset_migration_delete';
                $crudRoutePart = 'asset-migrations';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->addColumn('yield_curve_version_name', function ($row) {
                return $row->yield_curve ? $row->yield_curve->version_name : '';
            });

            $table->editColumn('jumlah_tahun', function ($row) {
                return $row->jumlah_tahun ? $row->jumlah_tahun : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('type', function ($row) {
                return $row->type ? AssetMigration::TYPE_SELECT[$row->type] : '';
            });
            $table->editColumn('version', function ($row) {
                return $row->version ? $row->version : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'yield_curve']);

            return $table->make(true);
        }

        $yield_curves = YieldCurve::get();

        return view('admin.assetMigrations.index', compact('yield_curves'));
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
