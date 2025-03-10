@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.liabilityPensiun.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.liability-pensiuns.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPensiun.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPensiun->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPensiun.fields.liability_portofolio') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPensiun->liability_portofolio->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPensiun.fields.report_date') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPensiun->report_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPensiun.fields.skenario') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPensiun->skenario }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPensiun.fields.tahun') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPensiun->tahun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPensiun.fields.peserta_pensiun') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPensiun->peserta_pensiun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPensiun.fields.iuran') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPensiun->iuran }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPensiun.fields.spppip') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPensiun->spppip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPensiun.fields.pembayaran_manfaat') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPensiun->pembayaran_manfaat }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.liability-pensiuns.index') }}">
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