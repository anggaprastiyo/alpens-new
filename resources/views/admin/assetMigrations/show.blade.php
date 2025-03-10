@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.assetMigration.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.asset-migrations.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetMigration.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $assetMigration->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetMigration.fields.yield_curve') }}
                                    </th>
                                    <td>
                                        {{ $assetMigration->yield_curve->version_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetMigration.fields.portofolio_date') }}
                                    </th>
                                    <td>
                                        {{ $assetMigration->portofolio_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetMigration.fields.jumlah_tahun') }}
                                    </th>
                                    <td>
                                        {{ $assetMigration->jumlah_tahun }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetMigration.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $assetMigration->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetMigration.fields.type') }}
                                    </th>
                                    <td>
                                        {{ App\Models\AssetMigration::TYPE_SELECT[$assetMigration->type] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.assetMigration.fields.version') }}
                                    </th>
                                    <td>
                                        {{ $assetMigration->version }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.asset-migrations.index') }}">
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