@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.liabilityPortofolio.title') }}
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.liability-portofolios.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPortofolio->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.biaya') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPortofolio->biaya->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.yield_curve') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPortofolio->yield_curve->version_name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPortofolio->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPortofolio->description }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.date') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPortofolio->date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.modified_duration_tht') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPortofolio->modified_duration_tht }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.macaulay_duration_tht') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPortofolio->macaulay_duration_tht }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.modified_duration_aip') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPortofolio->modified_duration_aip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.macaulay_duration_aip') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPortofolio->macaulay_duration_aip }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.modified_duration_jkk') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPortofolio->modified_duration_jkk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.macaulay_duration_jkk') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPortofolio->macaulay_duration_jkk }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.modified_duration_jkm') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPortofolio->modified_duration_jkm }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.macaulay_duration_jkm') }}
                                    </th>
                                    <td>
                                        {{ $liabilityPortofolio->macaulay_duration_jkm }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.liability-portofolios.index') }}">
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