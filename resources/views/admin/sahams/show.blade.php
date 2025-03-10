@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.saham.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.sahams.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $saham->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.asset_migration') }}
                                    </th>
                                    <td>
                                        {{ $saham->asset_migration->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.program') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Saham::PROGRAM_SELECT[$saham->program] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.level_1') }}
                                    </th>
                                    <td>
                                        {{ $saham->level_1 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.level_2') }}
                                    </th>
                                    <td>
                                        {{ $saham->level_2 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.level_3') }}
                                    </th>
                                    <td>
                                        {{ $saham->level_3 }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.ticker') }}
                                    </th>
                                    <td>
                                        {{ $saham->ticker }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $saham->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.nilai_perolehan') }}
                                    </th>
                                    <td>
                                        {{ $saham->nilai_perolehan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.harga_perolehan') }}
                                    </th>
                                    <td>
                                        {{ $saham->harga_perolehan }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.harga_pasar') }}
                                    </th>
                                    <td>
                                        {{ $saham->harga_pasar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.nilai_pasar') }}
                                    </th>
                                    <td>
                                        {{ $saham->nilai_pasar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.lembar_saham') }}
                                    </th>
                                    <td>
                                        {{ $saham->lembar_saham }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.deviden_saham') }}
                                    </th>
                                    <td>
                                        {{ $saham->deviden_saham }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.pembagian_deviden_saham') }}
                                    </th>
                                    <td>
                                        {{ $saham->pembagian_deviden_saham }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.market_cap_saham') }}
                                    </th>
                                    <td>
                                        {{ $saham->market_cap_saham }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.macaulay_duration') }}
                                    </th>
                                    <td>
                                        {{ $saham->macaulay_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.modified_duration') }}
                                    </th>
                                    <td>
                                        {{ $saham->modified_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.convexity_apporximation') }}
                                    </th>
                                    <td>
                                        {{ $saham->convexity_apporximation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.bobot_macaulay_duration') }}
                                    </th>
                                    <td>
                                        {{ $saham->bobot_macaulay_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.bobot_modified_duration') }}
                                    </th>
                                    <td>
                                        {{ $saham->bobot_modified_duration }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.bobot_convexity_apporximation') }}
                                    </th>
                                    <td>
                                        {{ $saham->bobot_convexity_apporximation }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.last_edited_by') }}
                                    </th>
                                    <td>
                                        {{ $saham->last_edited_by }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.is_updated') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $saham->is_updated ? 'checked' : '' }}>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.saham.fields.is_new') }}
                                    </th>
                                    <td>
                                        <input type="checkbox" disabled="disabled" {{ $saham->is_new ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.sahams.index') }}">
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