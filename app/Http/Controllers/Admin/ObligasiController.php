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
use Yajra\DataTables\Facades\DataTables;

class ObligasiController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('obligasi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Obligasi::with(['asset_migration'])->select(sprintf('%s.*', (new Obligasi)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'obligasi_show';
                $editGate      = 'obligasi_edit';
                $deleteGate    = 'obligasi_delete';
                $crudRoutePart = 'obligasis';

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
                return $row->program ? Obligasi::PROGRAM_SELECT[$row->program] : '';
            });
            $table->editColumn('level_3', function ($row) {
                return $row->level_3 ? $row->level_3 : '';
            });
            $table->editColumn('ticker', function ($row) {
                return $row->ticker ? $row->ticker : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('kupon', function ($row) {
                return $row->kupon ? $row->kupon : '';
            });
            $table->editColumn('harga_pasar', function ($row) {
                return $row->harga_pasar ? $row->harga_pasar : '';
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

        return view('admin.obligasis.index', compact('asset_migrations'));
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
