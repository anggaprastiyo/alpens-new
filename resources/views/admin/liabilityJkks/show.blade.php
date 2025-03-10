@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.liabilityJkk.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.liability-jkks.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkk.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkk->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkk.fields.liability_portofolio') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkk->liability_portofolio->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkk.fields.report_date') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkk->report_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkk.fields.skenario') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkk->skenario }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkk.fields.tahun') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkk->tahun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkk.fields.kps_jumlah_peserta_baru') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkk->kps_jumlah_peserta_baru }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkk.fields.kps_jumlah_peserta_aktif') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkk->kps_jumlah_peserta_aktif }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkk.fields.iuran') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkk->iuran }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkk.fields.jumlah_kejadian') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkk->jumlah_kejadian }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkk.fields.pembayaran_manfaat') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkk->pembayaran_manfaat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkk.fields.cadangan_teknis') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkk->cadangan_teknis }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkk.fields.cadangan_teknis_ibnr') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkk->cadangan_teknis_ibnr }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkk.fields.kenaikan_cadangan_teknis_ekdp') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkk->kenaikan_cadangan_teknis_ekdp }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkk.fields.kenaikan_cadangan_teknis_ibnr') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkk->kenaikan_cadangan_teknis_ibnr }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityJkk.fields.rasio_klaim') }}
                                    </th>
                                    <td>
                                        {{ $liabilityJkk->rasio_klaim }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.liability-jkks.index') }}">
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