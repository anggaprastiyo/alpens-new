@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.obligasi.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.obligasis.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.asset_migration') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->asset_migration->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.program') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Obligasi::PROGRAM_SELECT[$obligasi->program] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.level_1') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->level_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.level_2') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->level_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.level_3') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->level_3 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.ticker') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->ticker }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.rating') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->rating }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.tanggal_perolehan') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->tanggal_perolehan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.tanggal_maturity') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->tanggal_maturity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.nilai_nominal') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->nilai_nominal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.nilai_perolehan') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->nilai_perolehan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.harga_perolehan') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->harga_perolehan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.kupon') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->kupon }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.pembagian_kupon') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->pembagian_kupon }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.harga_pasar') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->harga_pasar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.nilai_pasar') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->nilai_pasar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.yield_to_maturity') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->yield_to_maturity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.faktor_pengurang') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->faktor_pengurang }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.tenor') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->tenor }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.sisa_tenor') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->sisa_tenor }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.macaulay_duration') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->macaulay_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.modified_duration') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->modified_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.convexity_apporximation') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->convexity_apporximation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.bobot_macaulay_duration') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->bobot_macaulay_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.bobot_modified_duration') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->bobot_modified_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.bobot_convexity_apporximation') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->bobot_convexity_apporximation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.last_edited_by') }}
                                    </th>
                                    <td>
                                        {{ $obligasi->last_edited_by }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.is_updated') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $obligasi->is_updated ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.obligasi.fields.is_new') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $obligasi->is_new ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.obligasis.index') }}">
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