@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.biayaDetail.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.biaya-details.update", [$biayaDetail->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('program') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.biayaDetail.fields.program') }}</label>
                            <select class="form-control" name="program" id="program">
                                <option value disabled {{ old('program', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\BiayaDetail::PROGRAM_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('program', $biayaDetail->program) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('program'))
                                <span class="help-block" role="alert">{{ $errors->first('program') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.biayaDetail.fields.program_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('iuran') ? 'has-error' : '' }}">
                            <label for="iuran">{{ trans('cruds.biayaDetail.fields.iuran') }}</label>
                            <input class="form-control" type="number" name="iuran" id="iuran" value="{{ old('iuran', $biayaDetail->iuran) }}" step="0.01">
                            @if($errors->has('iuran'))
                                <span class="help-block" role="alert">{{ $errors->first('iuran') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.biayaDetail.fields.iuran_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bop') ? 'has-error' : '' }}">
                            <label for="bop">{{ trans('cruds.biayaDetail.fields.bop') }}</label>
                            <input class="form-control" type="number" name="bop" id="bop" value="{{ old('bop', $biayaDetail->bop) }}" step="0.01">
                            @if($errors->has('bop'))
                                <span class="help-block" role="alert">{{ $errors->first('bop') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.biayaDetail.fields.bop_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('biaya_operasional') ? 'has-error' : '' }}">
                            <label class="required" for="biaya_operasional">{{ trans('cruds.biayaDetail.fields.biaya_operasional') }}</label>
                            <input class="form-control" type="number" name="biaya_operasional" id="biaya_operasional" value="{{ old('biaya_operasional', $biayaDetail->biaya_operasional) }}" step="0.01" required>
                            @if($errors->has('biaya_operasional'))
                                <span class="help-block" role="alert">{{ $errors->first('biaya_operasional') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.biayaDetail.fields.biaya_operasional_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rkap_iuran') ? 'has-error' : '' }}">
                            <label class="required" for="rkap_iuran">{{ trans('cruds.biayaDetail.fields.rkap_iuran') }}</label>
                            <input class="form-control" type="number" name="rkap_iuran" id="rkap_iuran" value="{{ old('rkap_iuran', $biayaDetail->rkap_iuran) }}" step="0.01" required>
                            @if($errors->has('rkap_iuran'))
                                <span class="help-block" role="alert">{{ $errors->first('rkap_iuran') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.biayaDetail.fields.rkap_iuran_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rkap_bop') ? 'has-error' : '' }}">
                            <label class="required" for="rkap_bop">{{ trans('cruds.biayaDetail.fields.rkap_bop') }}</label>
                            <input class="form-control" type="number" name="rkap_bop" id="rkap_bop" value="{{ old('rkap_bop', $biayaDetail->rkap_bop) }}" step="0.01" required>
                            @if($errors->has('rkap_bop'))
                                <span class="help-block" role="alert">{{ $errors->first('rkap_bop') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.biayaDetail.fields.rkap_bop_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rkap_biaya_operasional') ? 'has-error' : '' }}">
                            <label class="required" for="rkap_biaya_operasional">{{ trans('cruds.biayaDetail.fields.rkap_biaya_operasional') }}</label>
                            <input class="form-control" type="number" name="rkap_biaya_operasional" id="rkap_biaya_operasional" value="{{ old('rkap_biaya_operasional', $biayaDetail->rkap_biaya_operasional) }}" step="0.01" required>
                            @if($errors->has('rkap_biaya_operasional'))
                                <span class="help-block" role="alert">{{ $errors->first('rkap_biaya_operasional') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.biayaDetail.fields.rkap_biaya_operasional_helper') }}</span>
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