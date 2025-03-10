<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyRdptRequest;
use App\Http\Requests\StoreRdptRequest;
use App\Http\Requests\UpdateRdptRequest;
use App\Models\AssetMigration;
use App\Models\Rdpt;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RdptController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('rdpt_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rdpts = Rdpt::with(['asset_migration'])->get();

        $asset_migrations = AssetMigration::get();

        return view('admin.rdpts.index', compact('asset_migrations', 'rdpts'));
    }

    public function create()
    {
        abort_if(Gate::denies('rdpt_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset_migrations = AssetMigration::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.rdpts.create', compact('asset_migrations'));
    }

    public function store(StoreRdptRequest $request)
    {
        $rdpt = Rdpt::create($request->all());

        return redirect()->route('admin.rdpts.index');
    }

    public function edit(Rdpt $rdpt)
    {
        abort_if(Gate::denies('rdpt_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $asset_migrations = AssetMigration::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $rdpt->load('asset_migration');

        return view('admin.rdpts.edit', compact('asset_migrations', 'rdpt'));
    }

    public function update(UpdateRdptRequest $request, Rdpt $rdpt)
    {
        $rdpt->update($request->all());

        return redirect()->route('admin.rdpts.index');
    }

    public function show(Rdpt $rdpt)
    {
        abort_if(Gate::denies('rdpt_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rdpt->load('asset_migration');

        return view('admin.rdpts.show', compact('rdpt'));
    }

    public function destroy(Rdpt $rdpt)
    {
        abort_if(Gate::denies('rdpt_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $rdpt->delete();

        return back();
    }

    public function massDestroy(MassDestroyRdptRequest $request)
    {
        $rdpts = Rdpt::find(request('ids'));

        foreach ($rdpts as $rdpt) {
            $rdpt->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
