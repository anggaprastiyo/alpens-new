@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.biayaDetail.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.biaya-details.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.biayaDetail.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $biayaDetail->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.biayaDetail.fields.biaya') }}
                                    </th>
                                    <td>
                                        {{ $biayaDetail->biaya->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.biayaDetail.fields.program') }}
                                    </th>
                                    <td>
                                        {{ App\Models\BiayaDetail::PROGRAM_SELECT[$biayaDetail->program] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.biayaDetail.fields.iuran') }}
                                    </th>
                                    <td>
                                        {{ $biayaDetail->iuran }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.biayaDetail.fields.bop') }}
                                    </th>
                                    <td>
                                        {{ $biayaDetail->bop }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.biayaDetail.fields.biaya_operasional') }}
                                    </th>
                                    <td>
                                        {{ $biayaDetail->biaya_operasional }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.biayaDetail.fields.rkap_iuran') }}
                                    </th>
                                    <td>
                                        {{ $biayaDetail->rkap_iuran }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.biayaDetail.fields.rkap_bop') }}
                                    </th>
                                    <td>
                                        {{ $biayaDetail->rkap_bop }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.biayaDetail.fields.rkap_biaya_operasional') }}
                                    </th>
                                    <td>
                                        {{ $biayaDetail->rkap_biaya_operasional }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.biaya-details.index') }}">
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