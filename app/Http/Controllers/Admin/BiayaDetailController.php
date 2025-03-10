<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyBiayaDetailRequest;
use App\Http\Requests\StoreBiayaDetailRequest;
use App\Http\Requests\UpdateBiayaDetailRequest;
use App\Models\Biaya;
use App\Models\BiayaDetail;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class BiayaDetailController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('biaya_detail_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = BiayaDetail::with(['biaya'])->select(sprintf('%s.*', (new BiayaDetail)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'biaya_detail_show';
                $editGate      = 'biaya_detail_edit';
                $deleteGate    = 'biaya_detail_delete';
                $crudRoutePart = 'biaya-details';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
            });

            $table->editColumn('program', function ($row) {
                return $row->program ? BiayaDetail::PROGRAM_SELECT[$row->program] : '';
            });
            $table->editColumn('iuran', function ($row) {
                return $row->iuran ? $row->iuran : '';
            });
            $table->editColumn('bop', function ($row) {
                return $row->bop ? $row->bop : '';
            });
            $table->editColumn('biaya_operasional', function ($row) {
                return $row->biaya_operasional ? $row->biaya_operasional : '';
            });
            $table->editColumn('rkap_iuran', function ($row) {
                return $row->rkap_iuran ? $row->rkap_iuran : '';
            });
            $table->editColumn('rkap_bop', function ($row) {
                return $row->rkap_bop ? $row->rkap_bop : '';
            });
            $table->editColumn('rkap_biaya_operasional', function ($row) {
                return $row->rkap_biaya_operasional ? $row->rkap_biaya_operasional : '';
            });

            $table->rawColumns(['actions', 'placeholder']);

            return $table->make(true);
        }

        return view('admin.biayaDetails.index');
    }

    public function create()
    {
        abort_if(Gate::denies('biaya_detail_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biayas = Biaya::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.biayaDetails.create', compact('biayas'));
    }

    public function store(StoreBiayaDetailRequest $request)
    {
        $biayaDetail = BiayaDetail::create($request->all());

        return redirect()->route('admin.biaya-details.index');
    }

    public function edit(BiayaDetail $biayaDetail)
    {
        abort_if(Gate::denies('biaya_detail_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biayaDetail->load('biaya');

        return view('admin.biayaDetails.edit', compact('biayaDetail'));
    }

    public function update(UpdateBiayaDetailRequest $request, BiayaDetail $biayaDetail)
    {
        $biayaDetail->update($request->all());

        return redirect()->route('admin.biaya-details.index');
    }

    public function show(BiayaDetail $biayaDetail)
    {
        abort_if(Gate::denies('biaya_detail_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biayaDetail->load('biaya');

        return view('admin.biayaDetails.show', compact('biayaDetail'));
    }

    public function destroy(BiayaDetail $biayaDetail)
    {
        abort_if(Gate::denies('biaya_detail_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $biayaDetail->delete();

        return back();
    }

    public function massDestroy(MassDestroyBiayaDetailRequest $request)
    {
        $biayaDetails = BiayaDetail::find(request('ids'));

        foreach ($biayaDetails as $biayaDetail) {
            $biayaDetail->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
