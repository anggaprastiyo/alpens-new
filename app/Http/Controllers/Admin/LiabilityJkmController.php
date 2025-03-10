<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyLiabilityJkmRequest;
use App\Http\Requests\StoreLiabilityJkmRequest;
use App\Http\Requests\UpdateLiabilityJkmRequest;
use App\Models\LiabilityJkm;
use App\Models\LiabilityPortofolio;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LiabilityJkmController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('liability_jkm_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = LiabilityJkm::with(['liability_portofolio'])->select(sprintf('%s.*', (new LiabilityJkm)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'liability_jkm_show';
                $editGate      = 'liability_jkm_edit';
                $deleteGate    = 'liability_jkm_delete';
                $crudRoutePart = 'liability-jkms';

                return view('partials.datatablesActions', compact(
                    'viewGate',
                    'editGate',
                    'deleteGate',
                    'crudRoutePart',
                    'row'
                ));
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

        return view('admin.liabilityJkms.index');
    }

    public function create()
    {
        abort_if(Gate::denies('liability_jkm_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liability_portofolios = LiabilityPortofolio::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.liabilityJkms.create', compact('liability_portofolios'));
    }

    public function store(StoreLiabilityJkmRequest $request)
    {
        $liabilityJkm = LiabilityJkm::create($request->all());

        return redirect()->route('admin.liability-jkms.index');
    }

    public function edit(LiabilityJkm $liabilityJkm)
    {
        abort_if(Gate::denies('liability_jkm_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liability_portofolios = LiabilityPortofolio::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $liabilityJkm->load('liability_portofolio');

        return view('admin.liabilityJkms.edit', compact('liabilityJkm', 'liability_portofolios'));
    }

    public function update(UpdateLiabilityJkmRequest $request, LiabilityJkm $liabilityJkm)
    {
        $liabilityJkm->update($request->all());

        return redirect()->route('admin.liability-jkms.index');
    }

    public function show(LiabilityJkm $liabilityJkm)
    {
        abort_if(Gate::denies('liability_jkm_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityJkm->load('liability_portofolio');

        return view('admin.liabilityJkms.show', compact('liabilityJkm'));
    }

    public function destroy(LiabilityJkm $liabilityJkm)
    {
        abort_if(Gate::denies('liability_jkm_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityJkm->delete();

        return back();
    }

    public function massDestroy(MassDestroyLiabilityJkmRequest $request)
    {
        $liabilityJkms = LiabilityJkm::find(request('ids'));

        foreach ($liabilityJkms as $liabilityJkm) {
            $liabilityJkm->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
