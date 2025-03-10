@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.liabilityPortofolio.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.liability-portofolios.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('biaya') ? 'has-error' : '' }}">
                            <label class="required" for="biaya_id">{{ trans('cruds.liabilityPortofolio.fields.biaya') }}</label>
                            <select class="form-control select2" name="biaya_id" id="biaya_id" required>
                                @foreach($biayas as $id => $entry)
                                    <option value="{{ $id }}" {{ old('biaya_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('biaya'))
                                <span class="help-block" role="alert">{{ $errors->first('biaya') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.biaya_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('yield_curve') ? 'has-error' : '' }}">
                            <label for="yield_curve_id">{{ trans('cruds.liabilityPortofolio.fields.yield_curve') }}</label>
                            <select class="form-control select2" name="yield_curve_id" id="yield_curve_id">
                                @foreach($yield_curves as $id => $entry)
                                    <option value="{{ $id }}" {{ old('yield_curve_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('yield_curve'))
                                <span class="help-block" role="alert">{{ $errors->first('yield_curve') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.yield_curve_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.liabilityPortofolio.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.liabilityPortofolio.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label class="required" for="date">{{ trans('cruds.liabilityPortofolio.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date') }}" required>
                            @if($errors->has('date'))
                                <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('modified_duration_tht') ? 'has-error' : '' }}">
                            <label for="modified_duration_tht">{{ trans('cruds.liabilityPortofolio.fields.modified_duration_tht') }}</label>
                            <input class="form-control" type="number" name="modified_duration_tht" id="modified_duration_tht" value="{{ old('modified_duration_tht', '') }}" step="0.01">
                            @if($errors->has('modified_duration_tht'))
                                <span class="help-block" role="alert">{{ $errors->first('modified_duration_tht') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.modified_duration_tht_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('macaulay_duration_tht') ? 'has-error' : '' }}">
                            <label for="macaulay_duration_tht">{{ trans('cruds.liabilityPortofolio.fields.macaulay_duration_tht') }}</label>
                            <input class="form-control" type="number" name="macaulay_duration_tht" id="macaulay_duration_tht" value="{{ old('macaulay_duration_tht', '') }}" step="0.01">
                            @if($errors->has('macaulay_duration_tht'))
                                <span class="help-block" role="alert">{{ $errors->first('macaulay_duration_tht') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.macaulay_duration_tht_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('modified_duration_aip') ? 'has-error' : '' }}">
                            <label for="modified_duration_aip">{{ trans('cruds.liabilityPortofolio.fields.modified_duration_aip') }}</label>
                            <input class="form-control" type="number" name="modified_duration_aip" id="modified_duration_aip" value="{{ old('modified_duration_aip', '') }}" step="0.01">
                            @if($errors->has('modified_duration_aip'))
                                <span class="help-block" role="alert">{{ $errors->first('modified_duration_aip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.modified_duration_aip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('macaulay_duration_aip') ? 'has-error' : '' }}">
                            <label for="macaulay_duration_aip">{{ trans('cruds.liabilityPortofolio.fields.macaulay_duration_aip') }}</label>
                            <input class="form-control" type="number" name="macaulay_duration_aip" id="macaulay_duration_aip" value="{{ old('macaulay_duration_aip', '') }}" step="0.01">
                            @if($errors->has('macaulay_duration_aip'))
                                <span class="help-block" role="alert">{{ $errors->first('macaulay_duration_aip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.macaulay_duration_aip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('modified_duration_jkk') ? 'has-error' : '' }}">
                            <label for="modified_duration_jkk">{{ trans('cruds.liabilityPortofolio.fields.modified_duration_jkk') }}</label>
                            <input class="form-control" type="number" name="modified_duration_jkk" id="modified_duration_jkk" value="{{ old('modified_duration_jkk', '') }}" step="0.01">
                            @if($errors->has('modified_duration_jkk'))
                                <span class="help-block" role="alert">{{ $errors->first('modified_duration_jkk') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.modified_duration_jkk_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('macaulay_duration_jkk') ? 'has-error' : '' }}">
                            <label for="macaulay_duration_jkk">{{ trans('cruds.liabilityPortofolio.fields.macaulay_duration_jkk') }}</label>
                            <input class="form-control" type="number" name="macaulay_duration_jkk" id="macaulay_duration_jkk" value="{{ old('macaulay_duration_jkk', '') }}" step="0.01">
                            @if($errors->has('macaulay_duration_jkk'))
                                <span class="help-block" role="alert">{{ $errors->first('macaulay_duration_jkk') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.macaulay_duration_jkk_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('modified_duration_jkm') ? 'has-error' : '' }}">
                            <label for="modified_duration_jkm">{{ trans('cruds.liabilityPortofolio.fields.modified_duration_jkm') }}</label>
                            <input class="form-control" type="number" name="modified_duration_jkm" id="modified_duration_jkm" value="{{ old('modified_duration_jkm', '') }}" step="0.01">
                            @if($errors->has('modified_duration_jkm'))
                                <span class="help-block" role="alert">{{ $errors->first('modified_duration_jkm') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.modified_duration_jkm_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('macaulay_duration_jkm') ? 'has-error' : '' }}">
                            <label for="macaulay_duration_jkm">{{ trans('cruds.liabilityPortofolio.fields.macaulay_duration_jkm') }}</label>
                            <input class="form-control" type="number" name="macaulay_duration_jkm" id="macaulay_duration_jkm" value="{{ old('macaulay_duration_jkm', '') }}" step="0.01">
                            @if($errors->has('macaulay_duration_jkm'))
                                <span class="help-block" role="alert">{{ $errors->first('macaulay_duration_jkm') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.macaulay_duration_jkm_helper') }}</span>
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