<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyLiabilityThtRequest;
use App\Http\Requests\StoreLiabilityThtRequest;
use App\Http\Requests\UpdateLiabilityThtRequest;
use App\Models\LiabilityPortofolio;
use App\Models\LiabilityTht;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Yajra\DataTables\Facades\DataTables;

class LiabilityThtController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('liability_tht_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = LiabilityTht::with(['liability_portofolio'])->select(sprintf('%s.*', (new LiabilityTht)->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate      = 'liability_tht_show';
                $editGate      = 'liability_tht_edit';
                $deleteGate    = 'liability_tht_delete';
                $crudRoutePart = 'liability-thts';

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
            $table->editColumn('kps_jumlah_pns_baru', function ($row) {
                return $row->kps_jumlah_pns_baru ? $row->kps_jumlah_pns_baru : '';
            });
            $table->editColumn('kps_jumlah_peserta_aktif', function ($row) {
                return $row->kps_jumlah_peserta_aktif ? $row->kps_jumlah_peserta_aktif : '';
            });
            $table->editColumn('pensiun_iuran', function ($row) {
                return $row->pensiun_iuran ? $row->pensiun_iuran : '';
            });
            $table->editColumn('pensiun_manfaat', function ($row) {
                return $row->pensiun_manfaat ? $row->pensiun_manfaat : '';
            });
            $table->editColumn('tht_iuran_tht', function ($row) {
                return $row->tht_iuran_tht ? $row->tht_iuran_tht : '';
            });
            $table->editColumn('tht_iuran_si', function ($row) {
                return $row->tht_iuran_si ? $row->tht_iuran_si : '';
            });
            $table->editColumn('dwiguna_jumlah_klaim_pensiun', function ($row) {
                return $row->dwiguna_jumlah_klaim_pensiun ? $row->dwiguna_jumlah_klaim_pensiun : '';
            });
            $table->editColumn('dwiguna_jumlah_klaim_meninggal', function ($row) {
                return $row->dwiguna_jumlah_klaim_meninggal ? $row->dwiguna_jumlah_klaim_meninggal : '';
            });
            $table->editColumn('dwiguna_jumlah_klaim_keluar', function ($row) {
                return $row->dwiguna_jumlah_klaim_keluar ? $row->dwiguna_jumlah_klaim_keluar : '';
            });
            $table->editColumn('dwiguna_jumlah_pembayaran_pensiun', function ($row) {
                return $row->dwiguna_jumlah_pembayaran_pensiun ? $row->dwiguna_jumlah_pembayaran_pensiun : '';
            });
            $table->editColumn('dwiguna_jumlah_pembayaran_meninggal', function ($row) {
                return $row->dwiguna_jumlah_pembayaran_meninggal ? $row->dwiguna_jumlah_pembayaran_meninggal : '';
            });
            $table->editColumn('dwiguna_jumlah_pembayaran_keluar', function ($row) {
                return $row->dwiguna_jumlah_pembayaran_keluar ? $row->dwiguna_jumlah_pembayaran_keluar : '';
            });
            $table->editColumn('dwiguna_si_hp_pensiun', function ($row) {
                return $row->dwiguna_si_hp_pensiun ? $row->dwiguna_si_hp_pensiun : '';
            });
            $table->editColumn('dwiguna_si_hp_meninggal', function ($row) {
                return $row->dwiguna_si_hp_meninggal ? $row->dwiguna_si_hp_meninggal : '';
            });
            $table->editColumn('dwiguna_si_hp_keluar', function ($row) {
                return $row->dwiguna_si_hp_keluar ? $row->dwiguna_si_hp_keluar : '';
            });
            $table->editColumn('askem_aktif_jumlah_klaim_pensiun', function ($row) {
                return $row->askem_aktif_jumlah_klaim_pensiun ? $row->askem_aktif_jumlah_klaim_pensiun : '';
            });
            $table->editColumn('askem_aktif_jumlah_klaim_meninggal', function ($row) {
                return $row->askem_aktif_jumlah_klaim_meninggal ? $row->askem_aktif_jumlah_klaim_meninggal : '';
            });
            $table->editColumn('askem_aktif_jumlah_klaim_keluar', function ($row) {
                return $row->askem_aktif_jumlah_klaim_keluar ? $row->askem_aktif_jumlah_klaim_keluar : '';
            });
            $table->editColumn('askem_aktif_jumlah_pembayaran_pensiun', function ($row) {
                return $row->askem_aktif_jumlah_pembayaran_pensiun ? $row->askem_aktif_jumlah_pembayaran_pensiun : '';
            });
            $table->editColumn('askem_aktif_jumlah_pembayaran_meninggal', function ($row) {
                return $row->askem_aktif_jumlah_pembayaran_meninggal ? $row->askem_aktif_jumlah_pembayaran_meninggal : '';
            });
            $table->editColumn('askem_aktif_jumlah_pembayaran_keluar', function ($row) {
                return $row->askem_aktif_jumlah_pembayaran_keluar ? $row->askem_aktif_jumlah_pembayaran_keluar : '';
            });
            $table->editColumn('askem_pensiun_jumlah_klaim_pensiun', function ($row) {
                return $row->askem_pensiun_jumlah_klaim_pensiun ? $row->askem_pensiun_jumlah_klaim_pensiun : '';
            });
            $table->editColumn('askem_pensiun_jumlah_klaim_meninggal', function ($row) {
                return $row->askem_pensiun_jumlah_klaim_meninggal ? $row->askem_pensiun_jumlah_klaim_meninggal : '';
            });
            $table->editColumn('askem_pensiun_jumlah_klaim_keluar', function ($row) {
                return $row->askem_pensiun_jumlah_klaim_keluar ? $row->askem_pensiun_jumlah_klaim_keluar : '';
            });
            $table->editColumn('askem_pensiun_jumlah_pembayaran_pensiun', function ($row) {
                return $row->askem_pensiun_jumlah_pembayaran_pensiun ? $row->askem_pensiun_jumlah_pembayaran_pensiun : '';
            });
            $table->editColumn('askem_pensiun_jumlah_pembayaran_meninggal', function ($row) {
                return $row->askem_pensiun_jumlah_pembayaran_meninggal ? $row->askem_pensiun_jumlah_pembayaran_meninggal : '';
            });
            $table->editColumn('askem_pensiun_jumlah_pembayaran_keluar', function ($row) {
                return $row->askem_pensiun_jumlah_pembayaran_keluar ? $row->askem_pensiun_jumlah_pembayaran_keluar : '';
            });
            $table->editColumn('total_manfaat', function ($row) {
                return $row->total_manfaat ? $row->total_manfaat : '';
            });
            $table->editColumn('kmpmd_asuransi_dwiguna', function ($row) {
                return $row->kmpmd_asuransi_dwiguna ? $row->kmpmd_asuransi_dwiguna : '';
            });
            $table->editColumn('kmpmd_asuransi_kematian', function ($row) {
                return $row->kmpmd_asuransi_kematian ? $row->kmpmd_asuransi_kematian : '';
            });
            $table->editColumn('kenaikan_kmpmd', function ($row) {
                return $row->kenaikan_kmpmd ? $row->kenaikan_kmpmd : '';
            });
            $table->editColumn('liabilitas', function ($row) {
                return $row->liabilitas ? $row->liabilitas : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'liability_portofolio']);

            return $table->make(true);
        }

        return view('admin.liabilityThts.index');
    }

    public function create()
    {
        abort_if(Gate::denies('liability_tht_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liability_portofolios = LiabilityPortofolio::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.liabilityThts.create', compact('liability_portofolios'));
    }

    public function store(StoreLiabilityThtRequest $request)
    {
        $liabilityTht = LiabilityTht::create($request->all());

        return redirect()->route('admin.liability-thts.index');
    }

    public function edit(LiabilityTht $liabilityTht)
    {
        abort_if(Gate::denies('liability_tht_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liability_portofolios = LiabilityPortofolio::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $liabilityTht->load('liability_portofolio');

        return view('admin.liabilityThts.edit', compact('liabilityTht', 'liability_portofolios'));
    }

    public function update(UpdateLiabilityThtRequest $request, LiabilityTht $liabilityTht)
    {
        $liabilityTht->update($request->all());

        return redirect()->route('admin.liability-thts.index');
    }

    public function show(LiabilityTht $liabilityTht)
    {
        abort_if(Gate::denies('liability_tht_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityTht->load('liability_portofolio');

        return view('admin.liabilityThts.show', compact('liabilityTht'));
    }

    public function destroy(LiabilityTht $liabilityTht)
    {
        abort_if(Gate::denies('liability_tht_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $liabilityTht->delete();

        return back();
    }

    public function massDestroy(MassDestroyLiabilityThtRequest $request)
    {
        $liabilityThts = LiabilityTht::find(request('ids'));

        foreach ($liabilityThts as $liabilityTht) {
            $liabilityTht->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
