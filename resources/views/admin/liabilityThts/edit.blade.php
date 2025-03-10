@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.liabilityTht.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.liability-thts.update", [$liabilityTht->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('liability_portofolio') ? 'has-error' : '' }}">
                            <label class="required" for="liability_portofolio_id">{{ trans('cruds.liabilityTht.fields.liability_portofolio') }}</label>
                            <select class="form-control select2" name="liability_portofolio_id" id="liability_portofolio_id" required>
                                @foreach($liability_portofolios as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('liability_portofolio_id') ? old('liability_portofolio_id') : $liabilityTht->liability_portofolio->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('liability_portofolio'))
                                <span class="help-block" role="alert">{{ $errors->first('liability_portofolio') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.liability_portofolio_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('report_date') ? 'has-error' : '' }}">
                            <label class="required" for="report_date">{{ trans('cruds.liabilityTht.fields.report_date') }}</label>
                            <input class="form-control date" type="text" name="report_date" id="report_date" value="{{ old('report_date', $liabilityTht->report_date) }}" required>
                            @if($errors->has('report_date'))
                                <span class="help-block" role="alert">{{ $errors->first('report_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.report_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('skenario') ? 'has-error' : '' }}">
                            <label class="required" for="skenario">{{ trans('cruds.liabilityTht.fields.skenario') }}</label>
                            <input class="form-control" type="text" name="skenario" id="skenario" value="{{ old('skenario', $liabilityTht->skenario) }}" required>
                            @if($errors->has('skenario'))
                                <span class="help-block" role="alert">{{ $errors->first('skenario') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.skenario_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tahun') ? 'has-error' : '' }}">
                            <label class="required" for="tahun">{{ trans('cruds.liabilityTht.fields.tahun') }}</label>
                            <input class="form-control" type="number" name="tahun" id="tahun" value="{{ old('tahun', $liabilityTht->tahun) }}" step="1" required>
                            @if($errors->has('tahun'))
                                <span class="help-block" role="alert">{{ $errors->first('tahun') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.tahun_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kps_jumlah_pns_baru') ? 'has-error' : '' }}">
                            <label class="required" for="kps_jumlah_pns_baru">{{ trans('cruds.liabilityTht.fields.kps_jumlah_pns_baru') }}</label>
                            <input class="form-control" type="number" name="kps_jumlah_pns_baru" id="kps_jumlah_pns_baru" value="{{ old('kps_jumlah_pns_baru', $liabilityTht->kps_jumlah_pns_baru) }}" step="0.01" required>
                            @if($errors->has('kps_jumlah_pns_baru'))
                                <span class="help-block" role="alert">{{ $errors->first('kps_jumlah_pns_baru') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.kps_jumlah_pns_baru_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kps_jumlah_peserta_aktif') ? 'has-error' : '' }}">
                            <label class="required" for="kps_jumlah_peserta_aktif">{{ trans('cruds.liabilityTht.fields.kps_jumlah_peserta_aktif') }}</label>
                            <input class="form-control" type="number" name="kps_jumlah_peserta_aktif" id="kps_jumlah_peserta_aktif" value="{{ old('kps_jumlah_peserta_aktif', $liabilityTht->kps_jumlah_peserta_aktif) }}" step="0.01" required>
                            @if($errors->has('kps_jumlah_peserta_aktif'))
                                <span class="help-block" role="alert">{{ $errors->first('kps_jumlah_peserta_aktif') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.kps_jumlah_peserta_aktif_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pensiun_iuran') ? 'has-error' : '' }}">
                            <label class="required" for="pensiun_iuran">{{ trans('cruds.liabilityTht.fields.pensiun_iuran') }}</label>
                            <input class="form-control" type="number" name="pensiun_iuran" id="pensiun_iuran" value="{{ old('pensiun_iuran', $liabilityTht->pensiun_iuran) }}" step="0.01" required>
                            @if($errors->has('pensiun_iuran'))
                                <span class="help-block" role="alert">{{ $errors->first('pensiun_iuran') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.pensiun_iuran_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pensiun_manfaat') ? 'has-error' : '' }}">
                            <label class="required" for="pensiun_manfaat">{{ trans('cruds.liabilityTht.fields.pensiun_manfaat') }}</label>
                            <input class="form-control" type="number" name="pensiun_manfaat" id="pensiun_manfaat" value="{{ old('pensiun_manfaat', $liabilityTht->pensiun_manfaat) }}" step="0.01" required>
                            @if($errors->has('pensiun_manfaat'))
                                <span class="help-block" role="alert">{{ $errors->first('pensiun_manfaat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.pensiun_manfaat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tht_iuran_tht') ? 'has-error' : '' }}">
                            <label class="required" for="tht_iuran_tht">{{ trans('cruds.liabilityTht.fields.tht_iuran_tht') }}</label>
                            <input class="form-control" type="number" name="tht_iuran_tht" id="tht_iuran_tht" value="{{ old('tht_iuran_tht', $liabilityTht->tht_iuran_tht) }}" step="0.01" required>
                            @if($errors->has('tht_iuran_tht'))
                                <span class="help-block" role="alert">{{ $errors->first('tht_iuran_tht') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.tht_iuran_tht_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tht_iuran_si') ? 'has-error' : '' }}">
                            <label class="required" for="tht_iuran_si">{{ trans('cruds.liabilityTht.fields.tht_iuran_si') }}</label>
                            <input class="form-control" type="number" name="tht_iuran_si" id="tht_iuran_si" value="{{ old('tht_iuran_si', $liabilityTht->tht_iuran_si) }}" step="0.01" required>
                            @if($errors->has('tht_iuran_si'))
                                <span class="help-block" role="alert">{{ $errors->first('tht_iuran_si') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.tht_iuran_si_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dwiguna_jumlah_klaim_pensiun') ? 'has-error' : '' }}">
                            <label class="required" for="dwiguna_jumlah_klaim_pensiun">{{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_klaim_pensiun') }}</label>
                            <input class="form-control" type="number" name="dwiguna_jumlah_klaim_pensiun" id="dwiguna_jumlah_klaim_pensiun" value="{{ old('dwiguna_jumlah_klaim_pensiun', $liabilityTht->dwiguna_jumlah_klaim_pensiun) }}" step="0.01" required>
                            @if($errors->has('dwiguna_jumlah_klaim_pensiun'))
                                <span class="help-block" role="alert">{{ $errors->first('dwiguna_jumlah_klaim_pensiun') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_klaim_pensiun_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dwiguna_jumlah_klaim_meninggal') ? 'has-error' : '' }}">
                            <label class="required" for="dwiguna_jumlah_klaim_meninggal">{{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_klaim_meninggal') }}</label>
                            <input class="form-control" type="number" name="dwiguna_jumlah_klaim_meninggal" id="dwiguna_jumlah_klaim_meninggal" value="{{ old('dwiguna_jumlah_klaim_meninggal', $liabilityTht->dwiguna_jumlah_klaim_meninggal) }}" step="0.01" required>
                            @if($errors->has('dwiguna_jumlah_klaim_meninggal'))
                                <span class="help-block" role="alert">{{ $errors->first('dwiguna_jumlah_klaim_meninggal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_klaim_meninggal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dwiguna_jumlah_klaim_keluar') ? 'has-error' : '' }}">
                            <label class="required" for="dwiguna_jumlah_klaim_keluar">{{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_klaim_keluar') }}</label>
                            <input class="form-control" type="number" name="dwiguna_jumlah_klaim_keluar" id="dwiguna_jumlah_klaim_keluar" value="{{ old('dwiguna_jumlah_klaim_keluar', $liabilityTht->dwiguna_jumlah_klaim_keluar) }}" step="0.01" required>
                            @if($errors->has('dwiguna_jumlah_klaim_keluar'))
                                <span class="help-block" role="alert">{{ $errors->first('dwiguna_jumlah_klaim_keluar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_klaim_keluar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dwiguna_jumlah_pembayaran_pensiun') ? 'has-error' : '' }}">
                            <label class="required" for="dwiguna_jumlah_pembayaran_pensiun">{{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_pembayaran_pensiun') }}</label>
                            <input class="form-control" type="number" name="dwiguna_jumlah_pembayaran_pensiun" id="dwiguna_jumlah_pembayaran_pensiun" value="{{ old('dwiguna_jumlah_pembayaran_pensiun', $liabilityTht->dwiguna_jumlah_pembayaran_pensiun) }}" step="0.01" required>
                            @if($errors->has('dwiguna_jumlah_pembayaran_pensiun'))
                                <span class="help-block" role="alert">{{ $errors->first('dwiguna_jumlah_pembayaran_pensiun') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_pembayaran_pensiun_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dwiguna_jumlah_pembayaran_meninggal') ? 'has-error' : '' }}">
                            <label class="required" for="dwiguna_jumlah_pembayaran_meninggal">{{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_pembayaran_meninggal') }}</label>
                            <input class="form-control" type="number" name="dwiguna_jumlah_pembayaran_meninggal" id="dwiguna_jumlah_pembayaran_meninggal" value="{{ old('dwiguna_jumlah_pembayaran_meninggal', $liabilityTht->dwiguna_jumlah_pembayaran_meninggal) }}" step="0.01" required>
                            @if($errors->has('dwiguna_jumlah_pembayaran_meninggal'))
                                <span class="help-block" role="alert">{{ $errors->first('dwiguna_jumlah_pembayaran_meninggal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_pembayaran_meninggal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dwiguna_jumlah_pembayaran_keluar') ? 'has-error' : '' }}">
                            <label class="required" for="dwiguna_jumlah_pembayaran_keluar">{{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_pembayaran_keluar') }}</label>
                            <input class="form-control" type="number" name="dwiguna_jumlah_pembayaran_keluar" id="dwiguna_jumlah_pembayaran_keluar" value="{{ old('dwiguna_jumlah_pembayaran_keluar', $liabilityTht->dwiguna_jumlah_pembayaran_keluar) }}" step="0.01" required>
                            @if($errors->has('dwiguna_jumlah_pembayaran_keluar'))
                                <span class="help-block" role="alert">{{ $errors->first('dwiguna_jumlah_pembayaran_keluar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_pembayaran_keluar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dwiguna_si_hp_pensiun') ? 'has-error' : '' }}">
                            <label class="required" for="dwiguna_si_hp_pensiun">{{ trans('cruds.liabilityTht.fields.dwiguna_si_hp_pensiun') }}</label>
                            <input class="form-control" type="number" name="dwiguna_si_hp_pensiun" id="dwiguna_si_hp_pensiun" value="{{ old('dwiguna_si_hp_pensiun', $liabilityTht->dwiguna_si_hp_pensiun) }}" step="0.01" required>
                            @if($errors->has('dwiguna_si_hp_pensiun'))
                                <span class="help-block" role="alert">{{ $errors->first('dwiguna_si_hp_pensiun') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.dwiguna_si_hp_pensiun_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dwiguna_si_hp_meninggal') ? 'has-error' : '' }}">
                            <label class="required" for="dwiguna_si_hp_meninggal">{{ trans('cruds.liabilityTht.fields.dwiguna_si_hp_meninggal') }}</label>
                            <input class="form-control" type="number" name="dwiguna_si_hp_meninggal" id="dwiguna_si_hp_meninggal" value="{{ old('dwiguna_si_hp_meninggal', $liabilityTht->dwiguna_si_hp_meninggal) }}" step="0.01" required>
                            @if($errors->has('dwiguna_si_hp_meninggal'))
                                <span class="help-block" role="alert">{{ $errors->first('dwiguna_si_hp_meninggal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.dwiguna_si_hp_meninggal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('dwiguna_si_hp_keluar') ? 'has-error' : '' }}">
                            <label class="required" for="dwiguna_si_hp_keluar">{{ trans('cruds.liabilityTht.fields.dwiguna_si_hp_keluar') }}</label>
                            <input class="form-control" type="number" name="dwiguna_si_hp_keluar" id="dwiguna_si_hp_keluar" value="{{ old('dwiguna_si_hp_keluar', $liabilityTht->dwiguna_si_hp_keluar) }}" step="0.01" required>
                            @if($errors->has('dwiguna_si_hp_keluar'))
                                <span class="help-block" role="alert">{{ $errors->first('dwiguna_si_hp_keluar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.dwiguna_si_hp_keluar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('askem_aktif_jumlah_klaim_pensiun') ? 'has-error' : '' }}">
                            <label class="required" for="askem_aktif_jumlah_klaim_pensiun">{{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_klaim_pensiun') }}</label>
                            <input class="form-control" type="number" name="askem_aktif_jumlah_klaim_pensiun" id="askem_aktif_jumlah_klaim_pensiun" value="{{ old('askem_aktif_jumlah_klaim_pensiun', $liabilityTht->askem_aktif_jumlah_klaim_pensiun) }}" step="0.01" required>
                            @if($errors->has('askem_aktif_jumlah_klaim_pensiun'))
                                <span class="help-block" role="alert">{{ $errors->first('askem_aktif_jumlah_klaim_pensiun') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_klaim_pensiun_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('askem_aktif_jumlah_klaim_meninggal') ? 'has-error' : '' }}">
                            <label for="askem_aktif_jumlah_klaim_meninggal">{{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_klaim_meninggal') }}</label>
                            <input class="form-control" type="number" name="askem_aktif_jumlah_klaim_meninggal" id="askem_aktif_jumlah_klaim_meninggal" value="{{ old('askem_aktif_jumlah_klaim_meninggal', $liabilityTht->askem_aktif_jumlah_klaim_meninggal) }}" step="0.01">
                            @if($errors->has('askem_aktif_jumlah_klaim_meninggal'))
                                <span class="help-block" role="alert">{{ $errors->first('askem_aktif_jumlah_klaim_meninggal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_klaim_meninggal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('askem_aktif_jumlah_klaim_keluar') ? 'has-error' : '' }}">
                            <label class="required" for="askem_aktif_jumlah_klaim_keluar">{{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_klaim_keluar') }}</label>
                            <input class="form-control" type="number" name="askem_aktif_jumlah_klaim_keluar" id="askem_aktif_jumlah_klaim_keluar" value="{{ old('askem_aktif_jumlah_klaim_keluar', $liabilityTht->askem_aktif_jumlah_klaim_keluar) }}" step="0.01" required>
                            @if($errors->has('askem_aktif_jumlah_klaim_keluar'))
                                <span class="help-block" role="alert">{{ $errors->first('askem_aktif_jumlah_klaim_keluar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_klaim_keluar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('askem_aktif_jumlah_pembayaran_pensiun') ? 'has-error' : '' }}">
                            <label class="required" for="askem_aktif_jumlah_pembayaran_pensiun">{{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_pembayaran_pensiun') }}</label>
                            <input class="form-control" type="number" name="askem_aktif_jumlah_pembayaran_pensiun" id="askem_aktif_jumlah_pembayaran_pensiun" value="{{ old('askem_aktif_jumlah_pembayaran_pensiun', $liabilityTht->askem_aktif_jumlah_pembayaran_pensiun) }}" step="0.01" required>
                            @if($errors->has('askem_aktif_jumlah_pembayaran_pensiun'))
                                <span class="help-block" role="alert">{{ $errors->first('askem_aktif_jumlah_pembayaran_pensiun') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_pembayaran_pensiun_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('askem_aktif_jumlah_pembayaran_meninggal') ? 'has-error' : '' }}">
                            <label class="required" for="askem_aktif_jumlah_pembayaran_meninggal">{{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_pembayaran_meninggal') }}</label>
                            <input class="form-control" type="number" name="askem_aktif_jumlah_pembayaran_meninggal" id="askem_aktif_jumlah_pembayaran_meninggal" value="{{ old('askem_aktif_jumlah_pembayaran_meninggal', $liabilityTht->askem_aktif_jumlah_pembayaran_meninggal) }}" step="0.01" required>
                            @if($errors->has('askem_aktif_jumlah_pembayaran_meninggal'))
                                <span class="help-block" role="alert">{{ $errors->first('askem_aktif_jumlah_pembayaran_meninggal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_pembayaran_meninggal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('askem_aktif_jumlah_pembayaran_keluar') ? 'has-error' : '' }}">
                            <label class="required" for="askem_aktif_jumlah_pembayaran_keluar">{{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_pembayaran_keluar') }}</label>
                            <input class="form-control" type="number" name="askem_aktif_jumlah_pembayaran_keluar" id="askem_aktif_jumlah_pembayaran_keluar" value="{{ old('askem_aktif_jumlah_pembayaran_keluar', $liabilityTht->askem_aktif_jumlah_pembayaran_keluar) }}" step="0.01" required>
                            @if($errors->has('askem_aktif_jumlah_pembayaran_keluar'))
                                <span class="help-block" role="alert">{{ $errors->first('askem_aktif_jumlah_pembayaran_keluar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_pembayaran_keluar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('askem_pensiun_jumlah_klaim_pensiun') ? 'has-error' : '' }}">
                            <label class="required" for="askem_pensiun_jumlah_klaim_pensiun">{{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_klaim_pensiun') }}</label>
                            <input class="form-control" type="number" name="askem_pensiun_jumlah_klaim_pensiun" id="askem_pensiun_jumlah_klaim_pensiun" value="{{ old('askem_pensiun_jumlah_klaim_pensiun', $liabilityTht->askem_pensiun_jumlah_klaim_pensiun) }}" step="0.01" required>
                            @if($errors->has('askem_pensiun_jumlah_klaim_pensiun'))
                                <span class="help-block" role="alert">{{ $errors->first('askem_pensiun_jumlah_klaim_pensiun') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_klaim_pensiun_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('askem_pensiun_jumlah_klaim_meninggal') ? 'has-error' : '' }}">
                            <label class="required" for="askem_pensiun_jumlah_klaim_meninggal">{{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_klaim_meninggal') }}</label>
                            <input class="form-control" type="number" name="askem_pensiun_jumlah_klaim_meninggal" id="askem_pensiun_jumlah_klaim_meninggal" value="{{ old('askem_pensiun_jumlah_klaim_meninggal', $liabilityTht->askem_pensiun_jumlah_klaim_meninggal) }}" step="0.01" required>
                            @if($errors->has('askem_pensiun_jumlah_klaim_meninggal'))
                                <span class="help-block" role="alert">{{ $errors->first('askem_pensiun_jumlah_klaim_meninggal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_klaim_meninggal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('askem_pensiun_jumlah_klaim_keluar') ? 'has-error' : '' }}">
                            <label class="required" for="askem_pensiun_jumlah_klaim_keluar">{{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_klaim_keluar') }}</label>
                            <input class="form-control" type="number" name="askem_pensiun_jumlah_klaim_keluar" id="askem_pensiun_jumlah_klaim_keluar" value="{{ old('askem_pensiun_jumlah_klaim_keluar', $liabilityTht->askem_pensiun_jumlah_klaim_keluar) }}" step="0.01" required>
                            @if($errors->has('askem_pensiun_jumlah_klaim_keluar'))
                                <span class="help-block" role="alert">{{ $errors->first('askem_pensiun_jumlah_klaim_keluar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_klaim_keluar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('askem_pensiun_jumlah_pembayaran_pensiun') ? 'has-error' : '' }}">
                            <label class="required" for="askem_pensiun_jumlah_pembayaran_pensiun">{{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_pembayaran_pensiun') }}</label>
                            <input class="form-control" type="number" name="askem_pensiun_jumlah_pembayaran_pensiun" id="askem_pensiun_jumlah_pembayaran_pensiun" value="{{ old('askem_pensiun_jumlah_pembayaran_pensiun', $liabilityTht->askem_pensiun_jumlah_pembayaran_pensiun) }}" step="0.01" required>
                            @if($errors->has('askem_pensiun_jumlah_pembayaran_pensiun'))
                                <span class="help-block" role="alert">{{ $errors->first('askem_pensiun_jumlah_pembayaran_pensiun') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_pembayaran_pensiun_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('askem_pensiun_jumlah_pembayaran_meninggal') ? 'has-error' : '' }}">
                            <label class="required" for="askem_pensiun_jumlah_pembayaran_meninggal">{{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_pembayaran_meninggal') }}</label>
                            <input class="form-control" type="number" name="askem_pensiun_jumlah_pembayaran_meninggal" id="askem_pensiun_jumlah_pembayaran_meninggal" value="{{ old('askem_pensiun_jumlah_pembayaran_meninggal', $liabilityTht->askem_pensiun_jumlah_pembayaran_meninggal) }}" step="0.01" required>
                            @if($errors->has('askem_pensiun_jumlah_pembayaran_meninggal'))
                                <span class="help-block" role="alert">{{ $errors->first('askem_pensiun_jumlah_pembayaran_meninggal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_pembayaran_meninggal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('askem_pensiun_jumlah_pembayaran_keluar') ? 'has-error' : '' }}">
                            <label class="required" for="askem_pensiun_jumlah_pembayaran_keluar">{{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_pembayaran_keluar') }}</label>
                            <input class="form-control" type="number" name="askem_pensiun_jumlah_pembayaran_keluar" id="askem_pensiun_jumlah_pembayaran_keluar" value="{{ old('askem_pensiun_jumlah_pembayaran_keluar', $liabilityTht->askem_pensiun_jumlah_pembayaran_keluar) }}" step="0.01" required>
                            @if($errors->has('askem_pensiun_jumlah_pembayaran_keluar'))
                                <span class="help-block" role="alert">{{ $errors->first('askem_pensiun_jumlah_pembayaran_keluar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_pembayaran_keluar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('total_manfaat') ? 'has-error' : '' }}">
                            <label class="required" for="total_manfaat">{{ trans('cruds.liabilityTht.fields.total_manfaat') }}</label>
                            <input class="form-control" type="number" name="total_manfaat" id="total_manfaat" value="{{ old('total_manfaat', $liabilityTht->total_manfaat) }}" step="0.01" required>
                            @if($errors->has('total_manfaat'))
                                <span class="help-block" role="alert">{{ $errors->first('total_manfaat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.total_manfaat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kmpmd_asuransi_dwiguna') ? 'has-error' : '' }}">
                            <label for="kmpmd_asuransi_dwiguna">{{ trans('cruds.liabilityTht.fields.kmpmd_asuransi_dwiguna') }}</label>
                            <input class="form-control" type="number" name="kmpmd_asuransi_dwiguna" id="kmpmd_asuransi_dwiguna" value="{{ old('kmpmd_asuransi_dwiguna', $liabilityTht->kmpmd_asuransi_dwiguna) }}" step="0.01">
                            @if($errors->has('kmpmd_asuransi_dwiguna'))
                                <span class="help-block" role="alert">{{ $errors->first('kmpmd_asuransi_dwiguna') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.kmpmd_asuransi_dwiguna_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kmpmd_asuransi_kematian') ? 'has-error' : '' }}">
                            <label class="required" for="kmpmd_asuransi_kematian">{{ trans('cruds.liabilityTht.fields.kmpmd_asuransi_kematian') }}</label>
                            <input class="form-control" type="number" name="kmpmd_asuransi_kematian" id="kmpmd_asuransi_kematian" value="{{ old('kmpmd_asuransi_kematian', $liabilityTht->kmpmd_asuransi_kematian) }}" step="0.01" required>
                            @if($errors->has('kmpmd_asuransi_kematian'))
                                <span class="help-block" role="alert">{{ $errors->first('kmpmd_asuransi_kematian') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.kmpmd_asuransi_kematian_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kenaikan_kmpmd') ? 'has-error' : '' }}">
                            <label class="required" for="kenaikan_kmpmd">{{ trans('cruds.liabilityTht.fields.kenaikan_kmpmd') }}</label>
                            <input class="form-control" type="number" name="kenaikan_kmpmd" id="kenaikan_kmpmd" value="{{ old('kenaikan_kmpmd', $liabilityTht->kenaikan_kmpmd) }}" step="0.01" required>
                            @if($errors->has('kenaikan_kmpmd'))
                                <span class="help-block" role="alert">{{ $errors->first('kenaikan_kmpmd') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.kenaikan_kmpmd_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('liabilitas') ? 'has-error' : '' }}">
                            <label class="required" for="liabilitas">{{ trans('cruds.liabilityTht.fields.liabilitas') }}</label>
                            <input class="form-control" type="number" name="liabilitas" id="liabilitas" value="{{ old('liabilitas', $liabilityTht->liabilitas) }}" step="0.01" required>
                            @if($errors->has('liabilitas'))
                                <span class="help-block" role="alert">{{ $errors->first('liabilitas') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityTht.fields.liabilitas_helper') }}</span>
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