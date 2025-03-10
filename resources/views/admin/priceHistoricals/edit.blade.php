@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.priceHistorical.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.price-historicals.update", [$priceHistorical->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('ticker') ? 'has-error' : '' }}">
                            <label class="required" for="ticker">{{ trans('cruds.priceHistorical.fields.ticker') }}</label>
                            <input class="form-control" type="text" name="ticker" id="ticker" value="{{ old('ticker', $priceHistorical->ticker) }}" required>
                            @if($errors->has('ticker'))
                                <span class="help-block" role="alert">{{ $errors->first('ticker') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceHistorical.fields.ticker_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.priceHistorical.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $priceHistorical->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceHistorical.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
                            <label class="required" for="tanggal">{{ trans('cruds.priceHistorical.fields.tanggal') }}</label>
                            <input class="form-control date" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal', $priceHistorical->tanggal) }}" required>
                            @if($errors->has('tanggal'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceHistorical.fields.tanggal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('isin') ? 'has-error' : '' }}">
                            <label class="required" for="isin">{{ trans('cruds.priceHistorical.fields.isin') }}</label>
                            <input class="form-control" type="text" name="isin" id="isin" value="{{ old('isin', $priceHistorical->isin) }}" required>
                            @if($errors->has('isin'))
                                <span class="help-block" role="alert">{{ $errors->first('isin') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceHistorical.fields.isin_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rating') ? 'has-error' : '' }}">
                            <label class="required" for="rating">{{ trans('cruds.priceHistorical.fields.rating') }}</label>
                            <input class="form-control" type="text" name="rating" id="rating" value="{{ old('rating', $priceHistorical->rating) }}" required>
                            @if($errors->has('rating'))
                                <span class="help-block" role="alert">{{ $errors->first('rating') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceHistorical.fields.rating_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fair_yield') ? 'has-error' : '' }}">
                            <label class="required" for="fair_yield">{{ trans('cruds.priceHistorical.fields.fair_yield') }}</label>
                            <input class="form-control" type="number" name="fair_yield" id="fair_yield" value="{{ old('fair_yield', $priceHistorical->fair_yield) }}" step="0.01" required>
                            @if($errors->has('fair_yield'))
                                <span class="help-block" role="alert">{{ $errors->first('fair_yield') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceHistorical.fields.fair_yield_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('fair_price') ? 'has-error' : '' }}">
                            <label class="required" for="fair_price">{{ trans('cruds.priceHistorical.fields.fair_price') }}</label>
                            <input class="form-control" type="number" name="fair_price" id="fair_price" value="{{ old('fair_price', $priceHistorical->fair_price) }}" step="0.01" required>
                            @if($errors->has('fair_price'))
                                <span class="help-block" role="alert">{{ $errors->first('fair_price') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.priceHistorical.fields.fair_price_helper') }}</span>
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