@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.dataSapDetail.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.data-sap-details.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('data_sap') ? 'has-error' : '' }}">
                            <label class="required" for="data_sap_id">{{ trans('cruds.dataSapDetail.fields.data_sap') }}</label>
                            <select class="form-control select2" name="data_sap_id" id="data_sap_id" required>
                                @foreach($data_saps as $id => $entry)
                                    <option value="{{ $id }}" {{ old('data_sap_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('data_sap'))
                                <span class="help-block" role="alert">{{ $errors->first('data_sap') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.dataSapDetail.fields.data_sap_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('jenis_program') ? 'has-error' : '' }}">
                            <label class="required" for="jenis_program">{{ trans('cruds.dataSapDetail.fields.jenis_program') }}</label>
                            <input class="form-control" type="text" name="jenis_program" id="jenis_program" value="{{ old('jenis_program', '') }}" required>
                            @if($errors->has('jenis_program'))
                                <span class="help-block" role="alert">{{ $errors->first('jenis_program') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.dataSapDetail.fields.jenis_program_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('item') ? 'has-error' : '' }}">
                            <label class="required" for="item">{{ trans('cruds.dataSapDetail.fields.item') }}</label>
                            <input class="form-control" type="text" name="item" id="item" value="{{ old('item', '') }}" required>
                            @if($errors->has('item'))
                                <span class="help-block" role="alert">{{ $errors->first('item') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.dataSapDetail.fields.item_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nominal') ? 'has-error' : '' }}">
                            <label class="required" for="nominal">{{ trans('cruds.dataSapDetail.fields.nominal') }}</label>
                            <input class="form-control" type="number" name="nominal" id="nominal" value="{{ old('nominal', '') }}" step="0.01" required>
                            @if($errors->has('nominal'))
                                <span class="help-block" role="alert">{{ $errors->first('nominal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.dataSapDetail.fields.nominal_helper') }}</span>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection