@extends('layouts.admin')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        {{ trans('global.create') }} {{ trans('cruds.bopDetail.title_singular') }}
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="{{ route("admin.bop-details.store") }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group {{ $errors->has('bop') ? 'has-error' : '' }}">
                                <label class="required" for="bop_id">{{ trans('cruds.bopDetail.fields.bop') }}</label>
                                <select class="form-control select2" name="bop_id" id="bop_id" required>
                                    @foreach($bops as $id => $entry)
                                        <option value="{{ $id }}" {{ old('bop_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                    @endforeach
                                </select>
                                @if($errors->has('bop'))
                                    <span class="help-block" role="alert">{{ $errors->first('bop') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.bopDetail.fields.bop_helper') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('tahun') ? 'has-error' : '' }}">
                                <label class="required" for="tahun">{{ trans('cruds.bopDetail.fields.tahun') }}</label>
                                <input class="form-control" type="number" name="tahun" id="tahun" value="{{ old('tahun', '') }}" step="1" required>
                                @if($errors->has('tahun'))
                                    <span class="help-block" role="alert">{{ $errors->first('tahun') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.bopDetail.fields.tahun_helper') }}</span>
                            </div>
                            <div class="form-group {{ $errors->has('nilai_bop') ? 'has-error' : '' }}">
                                <label for="nilai_bop">{{ trans('cruds.bopDetail.fields.nilai_bop') }}</label>
                                <input class="form-control" type="number" name="nilai_bop" id="nilai_bop" value="{{ old('nilai_bop', '') }}" step="0.01">
                                @if($errors->has('nilai_bop'))
                                    <span class="help-block" role="alert">{{ $errors->first('nilai_bop') }}</span>
                                @endif
                                <span class="help-block">{{ trans('cruds.bopDetail.fields.nilai_bop_helper') }}</span>
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