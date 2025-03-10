<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLiabilityJkkRequest;
use App\Http\Requests\StoreLiabilityJkkRequest;
use App\Http\Requests\UpdateLiabilityJkkRequest;
use App\Models\LiabilityJkk;
use App\Models\LiabilityPortofolio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LiabilityJkkController extends Controller
{
    public function index(Request $request)
    {
        abort_if(Gate::denies('liability_jkk_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = LiabilityJkk::with(['liability_portofolio'])->select(sprintf('%s.*', (new LiabilityJkk)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'liability_jkk_show';
                $editGate      = 'liability_jkk_edit';
                $deleteGate    = 'liability_jkk_delete';
                $crudRoutePart = 'liability-jkks';

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
            $table->addColumn('liability_portofolio_name', function ($row) {
                return $row->liability_portofolio ? $row->liability_portofolio->name : '';
            });

            $table->editColumn('skenario', function ($row) {
                return $row->skenario ? $row->skenario : '';
            });
            $table->editColumn('tahun', function ($row) {
                return $row->tahun ? $row->tahun : '';
            });
            $table->editColumn('kps_jumlah_peserta_baru', function ($row) {
                return $row->kps_jumlah_peserta_baru ? $row->kps_jumlah_peserta_baru : '';
            });
            $table->editColumn('kps_jumlah_peserta_aktif', function ($row) {
                return $row->kps_jumlah_peserta_aktif ? $row->kps_jumlah_peserta_aktif : '';
            });
            $table->editColumn('iuran', function ($row) {
                return $row->iuran ? $row->iuran : '';
            });
            $table->editColumn('jumlah_kejadian', function ($row) {
                return $row->jumlah_kejadian ? $row->jumlah_kejadian : '';
            });
            $table->editColumn('pembayaran_manfaat', function ($row) {
                return $row->pembayaran_manfaat ? $row->pembayaran_manfaat : '';
            });
            $table->editColumn('cadangan_teknis', function ($row) {
                return $row->cadangan_teknis ? $row->cadangan_teknis : '';
            });
            $table->editColumn('cadangan_teknis_ibnr', function ($row) {
                return $row->cadangan_teknis_ibnr ? $row->cadangan_teknis_ibnr : '';
            });
            $table->editColumn('kenaikan_cadangan_teknis_ekdp', function ($row) {
                return $row->kenaikan_cadangan_teknis_ekdp ? $row->kenaikan_cadangan_teknis_ekdp : '';
            });
            $table->editColumn('kenaikan_cadangan_teknis_ibnr', function ($row) {
                return $row->kenaikan_cadangan_teknis_ibnr ? $row->kenaikan_cadangan_teknis_ibnr : '';
            });
            $table->editColumn('rasio_klaim', function ($row) {
                return $row->rasio_klaim ? $row->rasio_klaim : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'liability_portofolio']);

            return $table->make(true);
        }

        return view('admin.liabilityJkks.index');
    }

    public function create()
    {
        abort_if(Gate::denies('liability_jkk_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liability_portofolios = LiabilityPortofolio::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.liabilityJkks.create', compact('liability_portofolios'));
    }

    public function store(StoreLiabilityJkkRequest $request)
    {
        $liabilityJkk = LiabilityJkk::create($request->all());

        return redirect()->route('admin.liability-jkks.index');
    }

    public function edit(LiabilityJkk $liabilityJkk)
    {
        abort_if(Gate::denies('liability_jkk_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liability_portofolios = LiabilityPortofolio::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $liabilityJkk->load('liability_portofolio');

        return view('admin.liabilityJkks.edit', compact('liabilityJkk', 'liability_portofolios'));
    }

    public function update(UpdateLiabilityJkkRequest $request, LiabilityJkk $liabilityJkk)
    {
        $liabilityJkk->update($request->all());

        return redirect()->route('admin.liability-jkks.index');
    }

    public function show(LiabilityJkk $liabilityJkk)
    {
        abort_if(Gate::denies('liability_jkk_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityJkk->load('liability_portofolio');

        return view('admin.liabilityJkks.show', compact('liabilityJkk'));
    }

    public function destroy(LiabilityJkk $liabilityJkk)
    {
        abort_if(Gate::denies('liability_jkk_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityJkk->delete();

        return back();
    }

    public function massDestroy(MassDestroyLiabilityJkkRequest $request)
    {
        $liabilityJkks = LiabilityJkk::find(request('ids'));

        foreach ($liabilityJkks as $liabilityJkk) {
            $liabilityJkk->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
