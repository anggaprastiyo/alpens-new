@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.bopDetail.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.bop-details.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bopDetail.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $bopDetail->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bopDetail.fields.bop') }}
                                    </th>
                                    <td>
                                        {{ $bopDetail->bop->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bopDetail.fields.tahun') }}
                                    </th>
                                    <td>
                                        {{ $bopDetail->tahun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.bopDetail.fields.nilai_bop') }}
                                    </th>
                                    <td>
                                        {{ $bopDetail->nilai_bop }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.bop-details.index') }}">
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