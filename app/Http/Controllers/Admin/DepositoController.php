<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyDepositoRequest;
use App\Http\Requests\StoreDepositoRequest;
use App\Http\Requests\UpdateDepositoRequest;
use App\Models\AssetMigration;
use App\Models\Deposito;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class DepositoController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('deposito_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Deposito::with(['asset_migration'])->select(sprintf('%s.*', (new Deposito)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'deposito_show';
                $editGate      = 'deposito_edit';
                $deleteGate    = 'deposito_delete';
                $crudRoutePart = 'depositos';

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
            $table->addColumn('asset_migration_name', function ($row) {
                return $row->asset_migration ? $row->asset_migration->name : '';
            });

            $table->editColumn('program', function ($row) {
                return $row->program ? Deposito::PROGRAM_SELECT[$row->program] : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('bunga', function ($row) {
                return $row->bunga ? $row->bunga : '';
            });
            $table->editColumn('nilai_pasar', function ($row) {
                return $row->nilai_pasar ? $row->nilai_pasar : '';
            });
            $table->editColumn('macaulay_duration', function ($row) {
                return $row->macaulay_duration ? $row->macaulay_duration : '';
            });
            $table->editColumn('modified_duration', function ($row) {
                return $row->modified_duration ? $row->modified_duration : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'asset_migration']);

            return $table->make(true);
        }

        $asset_migrations = AssetMigration::get();

        return view('admin.depositos.index', compact('asset_migrations'));
    }

    public function create()
    {
        abort_if(Gate::denies('deposito_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset_migrations = AssetMigration::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.depositos.create', compact('asset_migrations'));
    }

    public function store(StoreDepositoRequest $request)
    {
        $deposito = Deposito::create($request->all());

        return redirect()->route('admin.depositos.index');
    }

    public function edit(Deposito $deposito)
    {
        abort_if(Gate::denies('deposito_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset_migrations = AssetMigration::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $deposito->load('asset_migration');

        return view('admin.depositos.edit', compact('asset_migrations', 'deposito'));
    }

    public function update(UpdateDepositoRequest $request, Deposito $deposito)
    {
        $deposito->update($request->all());

        return redirect()->route('admin.depositos.index');
    }

    public function show(Deposito $deposito)
    {
        abort_if(Gate::denies('deposito_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deposito->load('asset_migration');

        return view('admin.depositos.show', compact('deposito'));
    }

    public function destroy(Deposito $deposito)
    {
        abort_if(Gate::denies('deposito_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $deposito->delete();

        return back();
    }

    public function massDestroy(MassDestroyDepositoRequest $request)
    {
        $depositos = Deposito::find(request('ids'));

        foreach ($depositos as $deposito) {
            $deposito->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
