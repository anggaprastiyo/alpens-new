<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyObligasiRequest;
use App\Http\Requests\StoreObligasiRequest;
use App\Http\Requests\UpdateObligasiRequest;
use App\Models\AssetMigration;
use App\Models\Obligasi;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ObligasiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('obligasi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $obligasis = Obligasi::with(['asset_migration'])->get();

        $asset_migrations = AssetMigration::get();

        return view('admin.obligasis.index', compact('asset_migrations', 'obligasis'));
    }

    public function create()
    {
        abort_if(Gate::denies('obligasi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset_migrations = AssetMigration::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.obligasis.create', compact('asset_migrations'));
    }

    public function store(StoreObligasiRequest $request)
    {
        $obligasi = Obligasi::create($request->all());

        return redirect()->route('admin.obligasis.index');
    }

    public function edit(Obligasi $obligasi)
    {
        abort_if(Gate::denies('obligasi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset_migrations = AssetMigration::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $obligasi->load('asset_migration');

        return view('admin.obligasis.edit', compact('asset_migrations', 'obligasi'));
    }

    public function update(UpdateObligasiRequest $request, Obligasi $obligasi)
    {
        $obligasi->update($request->all());

        return redirect()->route('admin.obligasis.index');
    }

    public function show(Obligasi $obligasi)
    {
        abort_if(Gate::denies('obligasi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $obligasi->load('asset_migration');

        return view('admin.obligasis.show', compact('obligasi'));
    }

    public function destroy(Obligasi $obligasi)
    {
        abort_if(Gate::denies('obligasi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $obligasi->delete();

        return back();
    }

    public function massDestroy(MassDestroyObligasiRequest $request)
    {
        $obligasis = Obligasi::find(request('ids'));

        foreach ($obligasis as $obligasi) {
            $obligasi->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
