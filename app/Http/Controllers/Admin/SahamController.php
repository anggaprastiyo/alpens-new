<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroySahamRequest;
use App\Http\Requests\StoreSahamRequest;
use App\Http\Requests\UpdateSahamRequest;
use App\Models\AssetMigration;
use App\Models\Saham;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class SahamController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('saham_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Saham::with(['asset_migration'])->select(sprintf('%s.*', (new Saham)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'saham_show';
                $editGate      = 'saham_edit';
                $deleteGate    = 'saham_delete';
                $crudRoutePart = 'sahams';

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
                return $row->program ? Saham::PROGRAM_SELECT[$row->program] : '';
            });
            $table->editColumn('ticker', function ($row) {
                return $row->ticker ? $row->ticker : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('harga_pasar', function ($row) {
                return $row->harga_pasar ? $row->harga_pasar : '';
            });
            $table->editColumn('nilai_pasar', function ($row) {
                return $row->nilai_pasar ? $row->nilai_pasar : '';
            });
            $table->editColumn('lembar_saham', function ($row) {
                return $row->lembar_saham ? $row->lembar_saham : '';
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

        return view('admin.sahams.index', compact('asset_migrations'));
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
