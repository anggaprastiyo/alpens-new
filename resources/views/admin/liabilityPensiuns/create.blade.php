@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.liabilityPensiun.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.liability-pensiuns.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('liability_portofolio') ? 'has-error' : '' }}">
                            <label class="required" for="liability_portofolio_id">{{ trans('cruds.liabilityPensiun.fields.liability_portofolio') }}</label>
                            <select class="form-control select2" name="liability_portofolio_id" id="liability_portofolio_id" required>
                                @foreach($liability_portofolios as $id => $entry)
                                    <option value="{{ $id }}" {{ old('liability_portofolio_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('liability_portofolio'))
                                <span class="help-block" role="alert">{{ $errors->first('liability_portofolio') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPensiun.fields.liability_portofolio_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('report_date') ? 'has-error' : '' }}">
                            <label class="required" for="report_date">{{ trans('cruds.liabilityPensiun.fields.report_date') }}</label>
                            <input class="form-control date" type="text" name="report_date" id="report_date" value="{{ old('report_date') }}" required>
                            @if($errors->has('report_date'))
                                <span class="help-block" role="alert">{{ $errors->first('report_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPensiun.fields.report_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('skenario') ? 'has-error' : '' }}">
                            <label class="required" for="skenario">{{ trans('cruds.liabilityPensiun.fields.skenario') }}</label>
                            <input class="form-control" type="text" name="skenario" id="skenario" value="{{ old('skenario', '') }}" required>
                            @if($errors->has('skenario'))
                                <span class="help-block" role="alert">{{ $errors->first('skenario') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPensiun.fields.skenario_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tahun') ? 'has-error' : '' }}">
                            <label class="required" for="tahun">{{ trans('cruds.liabilityPensiun.fields.tahun') }}</label>
                            <input class="form-control" type="number" name="tahun" id="tahun" value="{{ old('tahun', '') }}" step="1" required>
                            @if($errors->has('tahun'))
                                <span class="help-block" role="alert">{{ $errors->first('tahun') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPensiun.fields.tahun_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('peserta_pensiun') ? 'has-error' : '' }}">
                            <label class="required" for="peserta_pensiun">{{ trans('cruds.liabilityPensiun.fields.peserta_pensiun') }}</label>
                            <input class="form-control" type="number" name="peserta_pensiun" id="peserta_pensiun" value="{{ old('peserta_pensiun', '') }}" step="0.01" required>
                            @if($errors->has('peserta_pensiun'))
                                <span class="help-block" role="alert">{{ $errors->first('peserta_pensiun') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPensiun.fields.peserta_pensiun_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('iuran') ? 'has-error' : '' }}">
                            <label class="required" for="iuran">{{ trans('cruds.liabilityPensiun.fields.iuran') }}</label>
                            <input class="form-control" type="number" name="iuran" id="iuran" value="{{ old('iuran', '') }}" step="0.01" required>
                            @if($errors->has('iuran'))
                                <span class="help-block" role="alert">{{ $errors->first('iuran') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPensiun.fields.iuran_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('spppip') ? 'has-error' : '' }}">
                            <label class="required" for="spppip">{{ trans('cruds.liabilityPensiun.fields.spppip') }}</label>
                            <input class="form-control" type="number" name="spppip" id="spppip" value="{{ old('spppip', '') }}" step="0.01" required>
                            @if($errors->has('spppip'))
                                <span class="help-block" role="alert">{{ $errors->first('spppip') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPensiun.fields.spppip_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pembayaran_manfaat') ? 'has-error' : '' }}">
                            <label class="required" for="pembayaran_manfaat">{{ trans('cruds.liabilityPensiun.fields.pembayaran_manfaat') }}</label>
                            <input class="form-control" type="number" name="pembayaran_manfaat" id="pembayaran_manfaat" value="{{ old('pembayaran_manfaat', '') }}" step="0.01" required>
                            @if($errors->has('pembayaran_manfaat'))
                                <span class="help-block" role="alert">{{ $errors->first('pembayaran_manfaat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPensiun.fields.pembayaran_manfaat_helper') }}</span>
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