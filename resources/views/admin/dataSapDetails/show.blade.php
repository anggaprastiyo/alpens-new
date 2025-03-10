@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.dataSapDetail.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.data-sap-details.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dataSapDetail.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $dataSapDetail->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dataSapDetail.fields.data_sap') }}
                                    </th>
                                    <td>
                                        {{ $dataSapDetail->data_sap->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dataSapDetail.fields.jenis_program') }}
                                    </th>
                                    <td>
                                        {{ $dataSapDetail->jenis_program }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dataSapDetail.fields.item') }}
                                    </th>
                                    <td>
                                        {{ $dataSapDetail->item }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.dataSapDetail.fields.nominal') }}
                                    </th>
                                    <td>
                                        {{ $dataSapDetail->nominal }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.data-sap-details.index') }}">
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