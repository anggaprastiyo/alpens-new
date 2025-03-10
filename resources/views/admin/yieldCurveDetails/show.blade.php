@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('global.show') }} {{ trans('cruds.yieldCurveDetail.title') }}
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <div class="form-group">
                                <a class="btn btn-default" href="{{ route('admin.yield-curve-details.index', ['id' => $yieldCurveDetail->yield_curve_id]) }}">
                                    {{ trans('global.back_to_list') }}
                                </a>
                            </div>
                            <table class="table table-bordered table-striped">
                                <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.yieldCurveDetail.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $yieldCurveDetail->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.yieldCurveDetail.fields.yield_curve') }}
                                    </th>
                                    <td>
                                        {{ $yieldCurveDetail->yield_curve->version_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.yieldCurveDetail.fields.tanggal') }}
                                    </th>
                                    <td>
                                        {{ $yieldCurveDetail->tanggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.yieldCurveDetail.fields.tenor_year') }}
                                    </th>
                                    <td>
                                        {{ $yieldCurveDetail->tenor_year }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.yieldCurveDetail.fields.today') }}
                                    </th>
                                    <td>
                                        {{ $yieldCurveDetail->today }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.yieldCurveDetail.fields.change_bps') }}
                                    </th>
                                    <td>
                                        {{ $yieldCurveDetail->change_bps }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.yieldCurveDetail.fields.yesterday_yield') }}
                                    </th>
                                    <td>
                                        {{ $yieldCurveDetail->yesterday_yield }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.yieldCurveDetail.fields.lastweek_yield') }}
                                    </th>
                                    <td>
                                        {{ $yieldCurveDetail->lastweek_yield }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.yieldCurveDetail.fields.lastmonth_yield') }}
                                    </th>
                                    <td>
                                        {{ $yieldCurveDetail->lastmonth_yield }}
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <a class="btn btn-default" href="{{ route('admin.yield-curve-details.index') }}">
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