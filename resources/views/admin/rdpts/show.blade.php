@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.rdpt.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.rdpts.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.asset_migration') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->asset_migration->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.program') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Rdpt::PROGRAM_SELECT[$rdpt->program] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.level_1') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->level_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.level_2') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->level_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.level_3') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->level_3 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.tanggal_perolehan') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->tanggal_perolehan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.tanggal_maturity') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->tanggal_maturity }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.nilai_nominal') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->nilai_nominal }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.nilai_perolehan') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->nilai_perolehan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.harga_perolehan') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->harga_perolehan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.kupon') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->kupon }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.pembagian_kupon') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->pembagian_kupon }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.nilai_pasar') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->nilai_pasar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.unit_penyertaan') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->unit_penyertaan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.nab') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->nab }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.macaulay_duration') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->macaulay_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.modified_duration') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->modified_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.convexity_apporximation') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->convexity_apporximation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.bobot_macaulay_duration') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->bobot_macaulay_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.bobot_modified_duration') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->bobot_modified_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.bobot_convexity_apporximation') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->bobot_convexity_apporximation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.last_edited_by') }}
                                    </th>
                                    <td>
                                        {{ $rdpt->last_edited_by }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.is_updated') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $rdpt->is_updated ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.is_new') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $rdpt->is_new ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.rdpts.index') }}">
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