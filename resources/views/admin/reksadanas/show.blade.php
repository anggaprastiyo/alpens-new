@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.reksadana.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.reksadanas.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.asset_migration') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->asset_migration->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.tipe_asset') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Reksadana::TIPE_ASSET_SELECT[$reksadana->tipe_asset] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.program') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Reksadana::PROGRAM_SELECT[$reksadana->program] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.level_1') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->level_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.level_2') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->level_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.level_3') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->level_3 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.ticker') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->ticker }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.nama_mi') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->nama_mi }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.tanggal_perolehan') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->tanggal_perolehan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.nilai_nominal') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->nilai_nominal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.nilai_perolehan') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->nilai_perolehan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.harga_perolehan') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->harga_perolehan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.nilai_pasar') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->nilai_pasar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.type_reksadana') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->type_reksadana }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.unit_penyertaan') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->unit_penyertaan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.nab') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->nab }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.macaulay_duration') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->macaulay_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.modified_duration') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->modified_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.convexity_apporximation') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->convexity_apporximation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.bobot_macaulay_duration') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->bobot_macaulay_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.bobot_modified_duration') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->bobot_modified_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.bobot_convexity_apporximation') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->bobot_convexity_apporximation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.last_edited_by') }}
                                    </th>
                                    <td>
                                        {{ $reksadana->last_edited_by }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.is_updated') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $reksadana->is_updated ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.reksadana.fields.is_new') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $reksadana->is_new ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.reksadanas.index') }}">
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