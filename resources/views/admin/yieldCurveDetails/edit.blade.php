@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.yieldCurveDetail.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.yield-curve-details.update", [$yieldCurveDetail->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('yield_curve') ? 'has-error' : '' }}">
                            <label class="required" for="yield_curve_id">{{ trans('cruds.yieldCurveDetail.fields.yield_curve') }}</label>
                            <select class="form-control select2" name="yield_curve_id" id="yield_curve_id" required>
                                @foreach($yield_curves as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('yield_curve_id') ? old('yield_curve_id') : $yieldCurveDetail->yield_curve->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('yield_curve'))
                                <span class="help-block" role="alert">{{ $errors->first('yield_curve') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.yieldCurveDetail.fields.yield_curve_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
                            <label class="required" for="tanggal">{{ trans('cruds.yieldCurveDetail.fields.tanggal') }}</label>
                            <input class="form-control date" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $yieldCurveDetail->tanggal) }}" required>
                            @if($errors->has('tanggal'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.yieldCurveDetail.fields.tanggal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tenor_year') ? 'has-error' : '' }}">
                            <label for="tenor_year">{{ trans('cruds.yieldCurveDetail.fields.tenor_year') }}</label>
                            <input class="form-control" type="number" name="tenor_year" id="tenor_year" value="{{ old('tenor_year', $yieldCurveDetail->tenor_year) }}" step="0.01">
                            @if($errors->has('tenor_year'))
                                <span class="help-block" role="alert">{{ $errors->first('tenor_year') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.yieldCurveDetail.fields.tenor_year_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('today') ? 'has-error' : '' }}">
                            <label class="required" for="today">{{ trans('cruds.yieldCurveDetail.fields.today') }}</label>
                            <input class="form-control" type="number" name="today" id="today" value="{{ old('today', $yieldCurveDetail->today) }}" step="0.01" required>
                            @if($errors->has('today'))
                                <span class="help-block" role="alert">{{ $errors->first('today') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.yieldCurveDetail.fields.today_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('change_bps') ? 'has-error' : '' }}">
                            <label class="required" for="change_bps">{{ trans('cruds.yieldCurveDetail.fields.change_bps') }}</label>
                            <input class="form-control" type="number" name="change_bps" id="change_bps" value="{{ old('change_bps', $yieldCurveDetail->change_bps) }}" step="0.01" required>
                            @if($errors->has('change_bps'))
                                <span class="help-block" role="alert">{{ $errors->first('change_bps') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.yieldCurveDetail.fields.change_bps_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('yesterday_yield') ? 'has-error' : '' }}">
                            <label class="required" for="yesterday_yield">{{ trans('cruds.yieldCurveDetail.fields.yesterday_yield') }}</label>
                            <input class="form-control" type="number" name="yesterday_yield" id="yesterday_yield" value="{{ old('yesterday_yield', $yieldCurveDetail->yesterday_yield) }}" step="0.01" required>
                            @if($errors->has('yesterday_yield'))
                                <span class="help-block" role="alert">{{ $errors->first('yesterday_yield') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.yieldCurveDetail.fields.yesterday_yield_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lastweek_yield') ? 'has-error' : '' }}">
                            <label class="required" for="lastweek_yield">{{ trans('cruds.yieldCurveDetail.fields.lastweek_yield') }}</label>
                            <input class="form-control" type="number" name="lastweek_yield" id="lastweek_yield" value="{{ old('lastweek_yield', $yieldCurveDetail->lastweek_yield) }}" step="0.01" required>
                            @if($errors->has('lastweek_yield'))
                                <span class="help-block" role="alert">{{ $errors->first('lastweek_yield') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.yieldCurveDetail.fields.lastweek_yield_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lastmonth_yield') ? 'has-error' : '' }}">
                            <label class="required" for="lastmonth_yield">{{ trans('cruds.yieldCurveDetail.fields.lastmonth_yield') }}</label>
                            <input class="form-control" type="number" name="lastmonth_yield" id="lastmonth_yield" value="{{ old('lastmonth_yield', $yieldCurveDetail->lastmonth_yield) }}" step="0.01" required>
                            @if($errors->has('lastmonth_yield'))
                                <span class="help-block" role="alert">{{ $errors->first('lastmonth_yield') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.yieldCurveDetail.fields.lastmonth_yield_helper') }}</span>
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