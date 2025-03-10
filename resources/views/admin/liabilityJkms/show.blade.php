@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.liabilityJkm.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.liability-jkms.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkm->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.liability_portofolio') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkm->liability_portofolio->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.report_date') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkm->report_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.skenario') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkm->skenario }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.tahun') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkm->tahun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.kps_jumlah_peserta_baru') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkm->kps_jumlah_peserta_baru }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.kps_jumlah_peserta_aktif') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkm->kps_jumlah_peserta_aktif }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.iuran') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkm->iuran }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.jumlah_kejadian') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkm->jumlah_kejadian }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.pembayaran_manfaat') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkm->pembayaran_manfaat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.cadangan_teknis') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkm->cadangan_teknis }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.cadangan_teknis_ibnr') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkm->cadangan_teknis_ibnr }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.kenaikan_cadangan_teknis_ekdp') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkm->kenaikan_cadangan_teknis_ekdp }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.kenaikan_cadangan_teknis_ibnr') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkm->kenaikan_cadangan_teknis_ibnr }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.rasio_klaim') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkm->rasio_klaim }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.liability-jkms.index') }}">
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