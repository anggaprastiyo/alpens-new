<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyBopDetailRequest;
use App\Http\Requests\StoreBopDetailRequest;
use App\Http\Requests\UpdateBopDetailRequest;
use App\Models\Bop;
use App\Models\BopDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BopDetailController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('bop_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BopDetail::with(['bop'])->select(sprintf('%s.*', (new BopDetail)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'bop_detail_show';
                $editGate      = 'bop_detail_edit';
                $deleteGate    = 'bop_detail_delete';
                $crudRoutePart = 'bop-details';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->addColumn('bop_name', function ($row) {
                return $row->bop ? $row->bop->name : '';
            });

            $table->editColumn('tahun', function ($row) {
                return $row->tahun ? $row->tahun : '';
            });
            $table->editColumn('nilai_bop', function ($row) {
                return $row->nilai_bop ? $row->nilai_bop : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'bop']);

            return $table->make(true);
        }

        return view('admin.bopDetails.index');
    }

    public function create()
    {
        abort_if(Gate::denies('bop_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bops = Bop::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.bopDetails.create', compact('bops'));
    }

    public function store(StoreBopDetailRequest $request)
    {
        $bopDetail = BopDetail::create($request->all());

        return redirect()->route('admin.bop-details.index');
    }

    public function edit(BopDetail $bopDetail)
    {
        abort_if(Gate::denies('bop_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bops = Bop::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $bopDetail->load('bop');

        return view('admin.bopDetails.edit', compact('bopDetail', 'bops'));
    }

    public function update(UpdateBopDetailRequest $request, BopDetail $bopDetail)
    {
        $bopDetail->update($request->all());

        return redirect()->route('admin.bop-details.index');
    }

    public function show(BopDetail $bopDetail)
    {
        abort_if(Gate::denies('bop_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bopDetail->load('bop');

        return view('admin.bopDetails.show', compact('bopDetail'));
    }

    public function destroy(BopDetail $bopDetail)
    {
        abort_if(Gate::denies('bop_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bopDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyBopDetailRequest $request)
    {
        $bopDetails = BopDetail::find(request('ids'));

        foreach ($bopDetails as $bopDetail) {
            $bopDetail->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
