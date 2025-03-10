<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyInvestasiLangsungRequest;
use App\Http\Requests\StoreInvestasiLangsungRequest;
use App\Http\Requests\UpdateInvestasiLangsungRequest;
use App\Models\AssetMigration;
use App\Models\InvestasiLangsung;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class InvestasiLangsungController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('investasi_langsung_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = InvestasiLangsung::with(['asset_migration'])->select(sprintf('%s.*', (new InvestasiLangsung)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'investasi_langsung_show';
                $editGate      = 'investasi_langsung_edit';
                $deleteGate    = 'investasi_langsung_delete';
                $crudRoutePart = 'investasi-langsungs';

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

            $table->editColumn('program', function ($row) {
                return $row->program ? InvestasiLangsung::PROGRAM_SELECT[$row->program] : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('nilai_pasar', function ($row) {
                return $row->nilai_pasar ? $row->nilai_pasar : '';
            });
            $table->editColumn('nilai_investasi', function ($row) {
                return $row->nilai_investasi ? $row->nilai_investasi : '';
            });
            $table->editColumn('modified_duration', function ($row) {
                return $row->modified_duration ? $row->modified_duration : '';
            });
            $table->editColumn('macaulay_duration', function ($row) {
                return $row->macaulay_duration ? $row->macaulay_duration : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'asset_migration']);

            return $table->make(true);
        }

        $asset_migrations = AssetMigration::get();

        return view('admin.investasiLangsungs.index', compact('asset_migrations'));
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
