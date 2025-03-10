<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyRdptRequest;
use App\Http\Requests\StoreRdptRequest;
use App\Http\Requests\UpdateRdptRequest;
use App\Models\AssetMigration;
use App\Models\Rdpt;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class RdptController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('rdpt_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Rdpt::with(['asset_migration'])->select(sprintf('%s.*', (new Rdpt)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'rdpt_show';
                $editGate      = 'rdpt_edit';
                $deleteGate    = 'rdpt_delete';
                $crudRoutePart = 'rdpts';

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
                return $row->program ? Rdpt::PROGRAM_SELECT[$row->program] : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->editColumn('nilai_nominal', function ($row) {
                return $row->nilai_nominal ? $row->nilai_nominal : '';
            });
            $table->editColumn('unit_penyertaan', function ($row) {
                return $row->unit_penyertaan ? $row->unit_penyertaan : '';
            });
            $table->editColumn('nab', function ($row) {
                return $row->nab ? $row->nab : '';
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

        return view('admin.rdpts.index', compact('asset_migrations'));
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
