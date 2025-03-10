@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.priceHistorical.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.price-historicals.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceHistorical.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $priceHistorical->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceHistorical.fields.ticker') }}
                                    </th>
                                    <td>
                                        {{ $priceHistorical->ticker }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceHistorical.fields.nama') }}
                                    </th>
                                    <td>
                                        {{ $priceHistorical->nama }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceHistorical.fields.tanggal') }}
                                    </th>
                                    <td>
                                        {{ $priceHistorical->tanggal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceHistorical.fields.isin') }}
                                    </th>
                                    <td>
                                        {{ $priceHistorical->isin }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceHistorical.fields.rating') }}
                                    </th>
                                    <td>
                                        {{ $priceHistorical->rating }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceHistorical.fields.fair_yield') }}
                                    </th>
                                    <td>
                                        {{ $priceHistorical->fair_yield }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.priceHistorical.fields.fair_price') }}
                                    </th>
                                    <td>
                                        {{ $priceHistorical->fair_price }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.price-historicals.index') }}">
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