@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.assetAdjustment.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.asset-adjustments.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.portfolio_date') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->portfolio_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.tipe_asset') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->tipe_asset }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.program') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->program }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.level_1') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->level_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.level_2') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->level_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.level_3') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->level_3 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.ticker') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->ticker }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.nama_bank') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->nama_bank }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.nomor_bilyet') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->nomor_bilyet }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.nama_mi') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->nama_mi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.rating') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->rating }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.tanggal_perolehan') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->tanggal_perolehan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.tanggal_maturity') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->tanggal_maturity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.nilai_nominal') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->nilai_nominal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.nilai_perolehan') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->nilai_perolehan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.harga_perolehan') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->harga_perolehan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.kupon') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->kupon }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.pembagian_kupon') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->pembagian_kupon }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.bunga') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->bunga }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.pembagian_bunga') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->pembagian_bunga }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.harga_pasar') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->harga_pasar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.nilai_pasar') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->nilai_pasar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.nilai_tercatat') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->nilai_tercatat }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.potential') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->potential }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.lembar_saham') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->lembar_saham }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.deviden_saham') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->deviden_saham }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.pembagian_deviden_saham') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->pembagian_deviden_saham }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.market_cap_saham') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->market_cap_saham }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.type_reksadana') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->type_reksadana }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.unit_penyertaan') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->unit_penyertaan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.nab') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->nab }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.time_to_maturity') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->time_to_maturity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.yield_to_maturity') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->yield_to_maturity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.faktor_pengurang') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->faktor_pengurang }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.tenor') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->tenor }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.sisa_tenor') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->sisa_tenor }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.macaulay_duration') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->macaulay_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.modified_duration') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->modified_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.convexity_apporximation') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->convexity_apporximation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.bobot_macaulay_duration') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->bobot_macaulay_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.bobot_modified_duration') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->bobot_modified_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.bobot_convexity_apporximation') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->bobot_convexity_apporximation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.tanggal_saldo_awal') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->tanggal_saldo_awal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.tanggal_add_set_modal') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->tanggal_add_set_modal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.nilai_investasi') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->nilai_investasi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.pelunasan_shl') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->pelunasan_shl }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.tambahan_setoran_modal') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->tambahan_setoran_modal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.div_yield_bunga') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->div_yield_bunga }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.pembagian_div_yield_bunga') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->pembagian_div_yield_bunga }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.projected_add_yield') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->projected_add_yield }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.divestasi') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->divestasi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.tanggal_divestasi') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->tanggal_divestasi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetAdjustment.fields.harga_perolehan_divestasi') }}
                                    </th>
                                    <td>
                                        {{ $assetAdjustment->harga_perolehan_divestasi }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.asset-adjustments.index') }}">
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