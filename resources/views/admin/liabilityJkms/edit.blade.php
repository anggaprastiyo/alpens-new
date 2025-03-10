@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.liabilityJkm.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.liability-jkms.update", [$liabilityJkm->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('liability_portofolio') ? 'has-error' : '' }}">
                            <label class="required" for="liability_portofolio_id">{{ trans('cruds.liabilityJkm.fields.liability_portofolio') }}</label>
                            <select class="form-control select2" name="liability_portofolio_id" id="liability_portofolio_id" required>
                                @foreach($liability_portofolios as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('liability_portofolio_id') ? old('liability_portofolio_id') : $liabilityJkm->liability_portofolio->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('liability_portofolio'))
                                <span class="help-block" role="alert">{{ $errors->first('liability_portofolio') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityJkm.fields.liability_portofolio_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('report_date') ? 'has-error' : '' }}">
                            <label class="required" for="report_date">{{ trans('cruds.liabilityJkm.fields.report_date') }}</label>
                            <input class="form-control date" type="text" name="report_date" id="report_date" value="{{ old('report_date', $liabilityJkm->report_date) }}" required>
                            @if($errors->has('report_date'))
                                <span class="help-block" role="alert">{{ $errors->first('report_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityJkm.fields.report_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('skenario') ? 'has-error' : '' }}">
                            <label class="required" for="skenario">{{ trans('cruds.liabilityJkm.fields.skenario') }}</label>
                            <input class="form-control" type="text" name="skenario" id="skenario" value="{{ old('skenario', $liabilityJkm->skenario) }}" required>
                            @if($errors->has('skenario'))
                                <span class="help-block" role="alert">{{ $errors->first('skenario') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityJkm.fields.skenario_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tahun') ? 'has-error' : '' }}">
                            <label class="required" for="tahun">{{ trans('cruds.liabilityJkm.fields.tahun') }}</label>
                            <input class="form-control" type="number" name="tahun" id="tahun" value="{{ old('tahun', $liabilityJkm->tahun) }}" step="1" required>
                            @if($errors->has('tahun'))
                                <span class="help-block" role="alert">{{ $errors->first('tahun') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityJkm.fields.tahun_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kps_jumlah_peserta_baru') ? 'has-error' : '' }}">
                            <label class="required" for="kps_jumlah_peserta_baru">{{ trans('cruds.liabilityJkm.fields.kps_jumlah_peserta_baru') }}</label>
                            <input class="form-control" type="number" name="kps_jumlah_peserta_baru" id="kps_jumlah_peserta_baru" value="{{ old('kps_jumlah_peserta_baru', $liabilityJkm->kps_jumlah_peserta_baru) }}" step="0.01" required>
                            @if($errors->has('kps_jumlah_peserta_baru'))
                                <span class="help-block" role="alert">{{ $errors->first('kps_jumlah_peserta_baru') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityJkm.fields.kps_jumlah_peserta_baru_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kps_jumlah_peserta_aktif') ? 'has-error' : '' }}">
                            <label class="required" for="kps_jumlah_peserta_aktif">{{ trans('cruds.liabilityJkm.fields.kps_jumlah_peserta_aktif') }}</label>
                            <input class="form-control" type="number" name="kps_jumlah_peserta_aktif" id="kps_jumlah_peserta_aktif" value="{{ old('kps_jumlah_peserta_aktif', $liabilityJkm->kps_jumlah_peserta_aktif) }}" step="0.01" required>
                            @if($errors->has('kps_jumlah_peserta_aktif'))
                                <span class="help-block" role="alert">{{ $errors->first('kps_jumlah_peserta_aktif') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityJkm.fields.kps_jumlah_peserta_aktif_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('iuran') ? 'has-error' : '' }}">
                            <label class="required" for="iuran">{{ trans('cruds.liabilityJkm.fields.iuran') }}</label>
                            <input class="form-control" type="number" name="iuran" id="iuran" value="{{ old('iuran', $liabilityJkm->iuran) }}" step="0.01" required>
                            @if($errors->has('iuran'))
                                <span class="help-block" role="alert">{{ $errors->first('iuran') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityJkm.fields.iuran_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('jumlah_kejadian') ? 'has-error' : '' }}">
                            <label class="required" for="jumlah_kejadian">{{ trans('cruds.liabilityJkm.fields.jumlah_kejadian') }}</label>
                            <input class="form-control" type="number" name="jumlah_kejadian" id="jumlah_kejadian" value="{{ old('jumlah_kejadian', $liabilityJkm->jumlah_kejadian) }}" step="0.01" required>
                            @if($errors->has('jumlah_kejadian'))
                                <span class="help-block" role="alert">{{ $errors->first('jumlah_kejadian') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityJkm.fields.jumlah_kejadian_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pembayaran_manfaat') ? 'has-error' : '' }}">
                            <label class="required" for="pembayaran_manfaat">{{ trans('cruds.liabilityJkm.fields.pembayaran_manfaat') }}</label>
                            <input class="form-control" type="number" name="pembayaran_manfaat" id="pembayaran_manfaat" value="{{ old('pembayaran_manfaat', $liabilityJkm->pembayaran_manfaat) }}" step="0.01" required>
                            @if($errors->has('pembayaran_manfaat'))
                                <span class="help-block" role="alert">{{ $errors->first('pembayaran_manfaat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityJkm.fields.pembayaran_manfaat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cadangan_teknis') ? 'has-error' : '' }}">
                            <label class="required" for="cadangan_teknis">{{ trans('cruds.liabilityJkm.fields.cadangan_teknis') }}</label>
                            <input class="form-control" type="number" name="cadangan_teknis" id="cadangan_teknis" value="{{ old('cadangan_teknis', $liabilityJkm->cadangan_teknis) }}" step="0.01" required>
                            @if($errors->has('cadangan_teknis'))
                                <span class="help-block" role="alert">{{ $errors->first('cadangan_teknis') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityJkm.fields.cadangan_teknis_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('cadangan_teknis_ibnr') ? 'has-error' : '' }}">
                            <label class="required" for="cadangan_teknis_ibnr">{{ trans('cruds.liabilityJkm.fields.cadangan_teknis_ibnr') }}</label>
                            <input class="form-control" type="number" name="cadangan_teknis_ibnr" id="cadangan_teknis_ibnr" value="{{ old('cadangan_teknis_ibnr', $liabilityJkm->cadangan_teknis_ibnr) }}" step="0.01" required>
                            @if($errors->has('cadangan_teknis_ibnr'))
                                <span class="help-block" role="alert">{{ $errors->first('cadangan_teknis_ibnr') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityJkm.fields.cadangan_teknis_ibnr_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kenaikan_cadangan_teknis_ekdp') ? 'has-error' : '' }}">
                            <label class="required" for="kenaikan_cadangan_teknis_ekdp">{{ trans('cruds.liabilityJkm.fields.kenaikan_cadangan_teknis_ekdp') }}</label>
                            <input class="form-control" type="number" name="kenaikan_cadangan_teknis_ekdp" id="kenaikan_cadangan_teknis_ekdp" value="{{ old('kenaikan_cadangan_teknis_ekdp', $liabilityJkm->kenaikan_cadangan_teknis_ekdp) }}" step="0.01" required>
                            @if($errors->has('kenaikan_cadangan_teknis_ekdp'))
                                <span class="help-block" role="alert">{{ $errors->first('kenaikan_cadangan_teknis_ekdp') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityJkm.fields.kenaikan_cadangan_teknis_ekdp_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kenaikan_cadangan_teknis_ibnr') ? 'has-error' : '' }}">
                            <label class="required" for="kenaikan_cadangan_teknis_ibnr">{{ trans('cruds.liabilityJkm.fields.kenaikan_cadangan_teknis_ibnr') }}</label>
                            <input class="form-control" type="number" name="kenaikan_cadangan_teknis_ibnr" id="kenaikan_cadangan_teknis_ibnr" value="{{ old('kenaikan_cadangan_teknis_ibnr', $liabilityJkm->kenaikan_cadangan_teknis_ibnr) }}" step="0.01" required>
                            @if($errors->has('kenaikan_cadangan_teknis_ibnr'))
                                <span class="help-block" role="alert">{{ $errors->first('kenaikan_cadangan_teknis_ibnr') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityJkm.fields.kenaikan_cadangan_teknis_ibnr_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rasio_klaim') ? 'has-error' : '' }}">
                            <label class="required" for="rasio_klaim">{{ trans('cruds.liabilityJkm.fields.rasio_klaim') }}</label>
                            <input class="form-control" type="number" name="rasio_klaim" id="rasio_klaim" value="{{ old('rasio_klaim', $liabilityJkm->rasio_klaim) }}" step="0.01" required>
                            @if($errors->has('rasio_klaim'))
                                <span class="help-block" role="alert">{{ $errors->first('rasio_klaim') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityJkm.fields.rasio_klaim_helper') }}</span>
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