@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.investasiLangsung.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.investasi-langsungs.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.asset_migration') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->asset_migration->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.program') }}
                                    </th>
                                    <td>
                                        {{ App\Models\InvestasiLangsung::PROGRAM_SELECT[$investasiLangsung->program] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.level_1') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->level_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.level_2') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->level_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.level_3') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->level_3 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.nilai_pasar') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->nilai_pasar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.market_cap_saham') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->market_cap_saham }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.convexity_apporximation') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->convexity_apporximation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.bobot_macaulay_duration') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->bobot_macaulay_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.bobot_modified_duration') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->bobot_modified_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.bobot_convexity_apporximation') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->bobot_convexity_apporximation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.tanggal_saldo_awal') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->tanggal_saldo_awal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.tanggal_add_set_modal') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->tanggal_add_set_modal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.nilai_investasi') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->nilai_investasi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.pelunasan_shl') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->pelunasan_shl }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.tambahan_setoran_modal') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->tambahan_setoran_modal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.div_yield_bunga') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->div_yield_bunga }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.pembagian_div_yield_bunga') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->pembagian_div_yield_bunga }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.projected_add_yield') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->projected_add_yield }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.divestasi') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->divestasi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.tanggal_divestasi') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->tanggal_divestasi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.harga_perolehan_divestasi') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->harga_perolehan_divestasi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.modified_duration') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->modified_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.macaulay_duration') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->macaulay_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.last_edited_by') }}
                                    </th>
                                    <td>
                                        {{ $investasiLangsung->last_edited_by }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.is_updated') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $investasiLangsung->is_updated ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.is_new') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $investasiLangsung->is_new ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.investasi-langsungs.index') }}">
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