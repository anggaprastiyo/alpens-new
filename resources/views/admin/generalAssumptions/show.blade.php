@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.generalAssumption.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.general-assumptions.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.version_name') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->version_name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.tahun_awal_proyeksi') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->tahun_awal_proyeksi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.tahun_akhir_proyeksi') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->tahun_akhir_proyeksi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.pajak_atas_kupon_obligasi') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->pajak_atas_kupon_obligasi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.pajak_atas_bunga_deposito') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->pajak_atas_bunga_deposito }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.kenaikan_bop_pertahun') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->kenaikan_bop_pertahun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.spread_yoi_untuk_si') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->spread_yoi_untuk_si }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.counter_rate') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->counter_rate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.spread_counter_rate') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->spread_counter_rate }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.tenor_saham') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->tenor_saham }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.tenor_reksadana') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->tenor_reksadana }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.tenor_inv_langsung') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->tenor_inv_langsung }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.capital_gain_saham') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->capital_gain_saham }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.capital_gain_reksadana') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->capital_gain_reksadana }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.capital_gain_inv_langsung') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->capital_gain_inv_langsung }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.capital_gain_rdpt') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->capital_gain_rdpt }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.generalAssumption.fields.market_cap_saham') }}
                                    </th>
                                    <td>
                                        {{ $generalAssumption->market_cap_saham }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.general-assumptions.index') }}">
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