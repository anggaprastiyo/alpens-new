@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.deposito.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.depositos.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $deposito->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.asset_migration') }}
                                    </th>
                                    <td>
                                        {{ $deposito->asset_migration->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.program') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Deposito::PROGRAM_SELECT[$deposito->program] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.level_1') }}
                                    </th>
                                    <td>
                                        {{ $deposito->level_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.level_2') }}
                                    </th>
                                    <td>
                                        {{ $deposito->level_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.level_3') }}
                                    </th>
                                    <td>
                                        {{ $deposito->level_3 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $deposito->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.nomor_bilyet') }}
                                    </th>
                                    <td>
                                        {{ $deposito->nomor_bilyet }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.tanggal_perolehan') }}
                                    </th>
                                    <td>
                                        {{ $deposito->tanggal_perolehan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.tanggal_maturity') }}
                                    </th>
                                    <td>
                                        {{ $deposito->tanggal_maturity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.nilai_nominal') }}
                                    </th>
                                    <td>
                                        {{ $deposito->nilai_nominal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.nilai_perolehan') }}
                                    </th>
                                    <td>
                                        {{ $deposito->nilai_perolehan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.bunga') }}
                                    </th>
                                    <td>
                                        {{ $deposito->bunga }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.pembagian_bunga') }}
                                    </th>
                                    <td>
                                        {{ $deposito->pembagian_bunga }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.nilai_pasar') }}
                                    </th>
                                    <td>
                                        {{ $deposito->nilai_pasar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.macaulay_duration') }}
                                    </th>
                                    <td>
                                        {{ $deposito->macaulay_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.modified_duration') }}
                                    </th>
                                    <td>
                                        {{ $deposito->modified_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.convexity_apporximation') }}
                                    </th>
                                    <td>
                                        {{ $deposito->convexity_apporximation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.bobot_macaulay_duration') }}
                                    </th>
                                    <td>
                                        {{ $deposito->bobot_macaulay_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.bobot_modified_duration') }}
                                    </th>
                                    <td>
                                        {{ $deposito->bobot_modified_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.bobot_convexity_apporximation') }}
                                    </th>
                                    <td>
                                        {{ $deposito->bobot_convexity_apporximation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.last_edited_by') }}
                                    </th>
                                    <td>
                                        {{ $deposito->last_edited_by }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.is_updated') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $deposito->is_updated ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.deposito.fields.is_new') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $deposito->is_new ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.depositos.index') }}">
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