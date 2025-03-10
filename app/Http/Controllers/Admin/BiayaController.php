<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBiayaRequest;
use App\Http\Requests\StoreBiayaRequest;
use App\Http\Requests\UpdateBiayaRequest;
use App\Models\Biaya;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BiayaController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('biaya_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = Biaya::query()->select(sprintf('%s.*', (new Biaya)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'biaya_show';
                $editGate      = 'biaya_edit';
                $deleteGate    = 'biaya_delete';
                $crudRoutePart = 'biayas';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('nama', function ($row) {
                return $row->nama ? $row->nama : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.biayas.index');
    }

    public function create()
    {
        abort_if(Gate::denies('biaya_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.biayas.create');
    }

    public function store(StoreBiayaRequest $request)
    {
        $biaya = Biaya::create($request->all());

        return redirect()->route('admin.biayas.index');
    }

    public function edit(Biaya $biaya)
    {
        abort_if(Gate::denies('biaya_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.biayas.edit', compact('biaya'));
    }

    public function update(UpdateBiayaRequest $request, Biaya $biaya)
    {
        $biaya->update($request->all());

        return redirect()->route('admin.biayas.index');
    }

    public function show(Biaya $biaya)
    {
        abort_if(Gate::denies('biaya_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.biayas.show', compact('biaya'));
    }

    public function destroy(Biaya $biaya)
    {
        abort_if(Gate::denies('biaya_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biaya->delete();

        return back();
    }

    public function massDestroy(MassDestroyBiayaRequest $request)
    {
        $biayas = Biaya::find(request('ids'));

        foreach ($biayas as $biaya) {
            $biaya->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
