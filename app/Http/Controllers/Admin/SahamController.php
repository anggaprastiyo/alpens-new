<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroySahamRequest;
use App\Http\Requests\StoreSahamRequest;
use App\Http\Requests\UpdateSahamRequest;
use App\Models\AssetMigration;
use App\Models\Saham;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SahamController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('saham_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $sahams = Saham::with(['asset_migration'])->get();

        $asset_migrations = AssetMigration::get();

        return view('admin.sahams.index', compact('asset_migrations', 'sahams'));
    }

    public function create()
    {
        abort_if(Gate::denies('saham_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset_migrations = AssetMigration::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.sahams.create', compact('asset_migrations'));
    }

    public function store(StoreSahamRequest $request)
    {
        $saham = Saham::create($request->all());

        return redirect()->route('admin.sahams.index');
    }

    public function edit(Saham $saham)
    {
        abort_if(Gate::denies('saham_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset_migrations = AssetMigration::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $saham->load('asset_migration');

        return view('admin.sahams.edit', compact('asset_migrations', 'saham'));
    }

    public function update(UpdateSahamRequest $request, Saham $saham)
    {
        $saham->update($request->all());

        return redirect()->route('admin.sahams.index');
    }

    public function show(Saham $saham)
    {
        abort_if(Gate::denies('saham_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $saham->load('asset_migration');

        return view('admin.sahams.show', compact('saham'));
    }

    public function destroy(Saham $saham)
    {
        abort_if(Gate::denies('saham_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $saham->delete();

        return back();
    }

    public function massDestroy(MassDestroySahamRequest $request)
    {
        $sahams = Saham::find(request('ids'));

        foreach ($sahams as $saham) {
            $saham->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
