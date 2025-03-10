@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.liabilityTht.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.liability-thts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.liability_portofolio') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->liability_portofolio->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.report_date') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->report_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.skenario') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->skenario }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.tahun') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->tahun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.kps_jumlah_pns_baru') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->kps_jumlah_pns_baru }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.kps_jumlah_peserta_aktif') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->kps_jumlah_peserta_aktif }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.pensiun_iuran') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->pensiun_iuran }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.pensiun_manfaat') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->pensiun_manfaat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.tht_iuran_tht') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->tht_iuran_tht }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.tht_iuran_si') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->tht_iuran_si }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_klaim_pensiun') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->dwiguna_jumlah_klaim_pensiun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_klaim_meninggal') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->dwiguna_jumlah_klaim_meninggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_klaim_keluar') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->dwiguna_jumlah_klaim_keluar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_pembayaran_pensiun') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->dwiguna_jumlah_pembayaran_pensiun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_pembayaran_meninggal') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->dwiguna_jumlah_pembayaran_meninggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_pembayaran_keluar') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->dwiguna_jumlah_pembayaran_keluar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.dwiguna_si_hp_pensiun') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->dwiguna_si_hp_pensiun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.dwiguna_si_hp_meninggal') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->dwiguna_si_hp_meninggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.dwiguna_si_hp_keluar') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->dwiguna_si_hp_keluar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_klaim_pensiun') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->askem_aktif_jumlah_klaim_pensiun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_klaim_meninggal') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->askem_aktif_jumlah_klaim_meninggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_klaim_keluar') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->askem_aktif_jumlah_klaim_keluar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_pembayaran_pensiun') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->askem_aktif_jumlah_pembayaran_pensiun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_pembayaran_meninggal') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->askem_aktif_jumlah_pembayaran_meninggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_pembayaran_keluar') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->askem_aktif_jumlah_pembayaran_keluar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_klaim_pensiun') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->askem_pensiun_jumlah_klaim_pensiun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_klaim_meninggal') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->askem_pensiun_jumlah_klaim_meninggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_klaim_keluar') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->askem_pensiun_jumlah_klaim_keluar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_pembayaran_pensiun') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->askem_pensiun_jumlah_pembayaran_pensiun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_pembayaran_meninggal') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->askem_pensiun_jumlah_pembayaran_meninggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_pembayaran_keluar') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->askem_pensiun_jumlah_pembayaran_keluar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.total_manfaat') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->total_manfaat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.kmpmd_asuransi_dwiguna') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->kmpmd_asuransi_dwiguna }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.kmpmd_asuransi_kematian') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->kmpmd_asuransi_kematian }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.kenaikan_kmpmd') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->kenaikan_kmpmd }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityTht.fields.liabilitas') }}
                                    </th>
                                    <td>
                                        {{ $liabilityTht->liabilitas }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.liability-thts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection