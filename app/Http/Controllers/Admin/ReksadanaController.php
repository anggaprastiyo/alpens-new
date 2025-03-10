<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyReksadanaRequest;
use App\Http\Requests\StoreReksadanaRequest;
use App\Http\Requests\UpdateReksadanaRequest;
use App\Models\AssetMigration;
use App\Models\Reksadana;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class ReksadanaController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('reksadana_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Reksadana::with(['asset_migration'])->select(sprintf('%s.*', (new Reksadana)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'reksadana_show';
                $editGate      = 'reksadana_edit';
                $deleteGate    = 'reksadana_delete';
                $crudRoutePart = 'reksadanas';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->addColumn('asset_migration_name', function ($row) {
                return $row->asset_migration ? $row->asset_migration->name : '';
            });

            $table->editColumn('tipe_asset', function ($row) {
                return $row->tipe_asset ? Reksadana::TIPE_ASSET_SELECT[$row->tipe_asset] : '';
            });
            $table->editColumn('program', function ($row) {
                return $row->program ? Reksadana::PROGRAM_SELECT[$row->program] : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('nilai_nominal', function ($row) {
                return $row->nilai_nominal ? $row->nilai_nominal : '';
            });
            $table->editColumn('type_reksadana', function ($row) {
                return $row->type_reksadana ? $row->type_reksadana : '';
            });
            $table->editColumn('unit_penyertaan', function ($row) {
                return $row->unit_penyertaan ? $row->unit_penyertaan : '';
            });
            $table->editColumn('nab', function ($row) {
                return $row->nab ? $row->nab : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'asset_migration']);

            return $table->make(true);
        }

        $asset_migrations = AssetMigration::get();

        return view('admin.reksadanas.index', compact('asset_migrations'));
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
