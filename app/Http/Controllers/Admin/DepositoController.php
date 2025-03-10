<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyDepositoRequest;
use App\Http\Requests\StoreDepositoRequest;
use App\Http\Requests\UpdateDepositoRequest;
use App\Models\AssetMigration;
use App\Models\Deposito;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DepositoController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('deposito_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $depositos = Deposito::with(['asset_migration'])->get();

        $asset_migrations = AssetMigration::get();

        return view('admin.depositos.index', compact('asset_migrations', 'depositos'));
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
