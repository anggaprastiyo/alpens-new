@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.generalAssumption.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.general-assumptions.update", [$generalAssumption->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('version_name') ? 'has-error' : '' }}">
                            <label class="required" for="version_name">{{ trans('cruds.generalAssumption.fields.version_name') }}</label>
                            <input class="form-control" type="text" name="version_name" id="version_name" value="{{ old('version_name', $generalAssumption->version_name) }}" required>
                            @if($errors->has('version_name'))
                                <span class="help-block" role="alert">{{ $errors->first('version_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.version_name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tahun_awal_proyeksi') ? 'has-error' : '' }}">
                            <label class="required" for="tahun_awal_proyeksi">{{ trans('cruds.generalAssumption.fields.tahun_awal_proyeksi') }}</label>
                            <input class="form-control" type="number" name="tahun_awal_proyeksi" id="tahun_awal_proyeksi" value="{{ old('tahun_awal_proyeksi', $generalAssumption->tahun_awal_proyeksi) }}" step="1" required>
                            @if($errors->has('tahun_awal_proyeksi'))
                                <span class="help-block" role="alert">{{ $errors->first('tahun_awal_proyeksi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.tahun_awal_proyeksi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tahun_akhir_proyeksi') ? 'has-error' : '' }}">
                            <label class="required" for="tahun_akhir_proyeksi">{{ trans('cruds.generalAssumption.fields.tahun_akhir_proyeksi') }}</label>
                            <input class="form-control" type="number" name="tahun_akhir_proyeksi" id="tahun_akhir_proyeksi" value="{{ old('tahun_akhir_proyeksi', $generalAssumption->tahun_akhir_proyeksi) }}" step="1" required>
                            @if($errors->has('tahun_akhir_proyeksi'))
                                <span class="help-block" role="alert">{{ $errors->first('tahun_akhir_proyeksi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.tahun_akhir_proyeksi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pajak_atas_kupon_obligasi') ? 'has-error' : '' }}">
                            <label class="required" for="pajak_atas_kupon_obligasi">{{ trans('cruds.generalAssumption.fields.pajak_atas_kupon_obligasi') }}</label>
                            <input class="form-control" type="number" name="pajak_atas_kupon_obligasi" id="pajak_atas_kupon_obligasi" value="{{ old('pajak_atas_kupon_obligasi', $generalAssumption->pajak_atas_kupon_obligasi) }}" step="0.01" required>
                            @if($errors->has('pajak_atas_kupon_obligasi'))
                                <span class="help-block" role="alert">{{ $errors->first('pajak_atas_kupon_obligasi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.pajak_atas_kupon_obligasi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pajak_atas_bunga_deposito') ? 'has-error' : '' }}">
                            <label class="required" for="pajak_atas_bunga_deposito">{{ trans('cruds.generalAssumption.fields.pajak_atas_bunga_deposito') }}</label>
                            <input class="form-control" type="number" name="pajak_atas_bunga_deposito" id="pajak_atas_bunga_deposito" value="{{ old('pajak_atas_bunga_deposito', $generalAssumption->pajak_atas_bunga_deposito) }}" step="0.01" required>
                            @if($errors->has('pajak_atas_bunga_deposito'))
                                <span class="help-block" role="alert">{{ $errors->first('pajak_atas_bunga_deposito') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.pajak_atas_bunga_deposito_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kenaikan_bop_pertahun') ? 'has-error' : '' }}">
                            <label class="required" for="kenaikan_bop_pertahun">{{ trans('cruds.generalAssumption.fields.kenaikan_bop_pertahun') }}</label>
                            <input class="form-control" type="number" name="kenaikan_bop_pertahun" id="kenaikan_bop_pertahun" value="{{ old('kenaikan_bop_pertahun', $generalAssumption->kenaikan_bop_pertahun) }}" step="0.01" required>
                            @if($errors->has('kenaikan_bop_pertahun'))
                                <span class="help-block" role="alert">{{ $errors->first('kenaikan_bop_pertahun') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.kenaikan_bop_pertahun_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('spread_yoi_untuk_si') ? 'has-error' : '' }}">
                            <label class="required" for="spread_yoi_untuk_si">{{ trans('cruds.generalAssumption.fields.spread_yoi_untuk_si') }}</label>
                            <input class="form-control" type="number" name="spread_yoi_untuk_si" id="spread_yoi_untuk_si" value="{{ old('spread_yoi_untuk_si', $generalAssumption->spread_yoi_untuk_si) }}" step="0.01" required>
                            @if($errors->has('spread_yoi_untuk_si'))
                                <span class="help-block" role="alert">{{ $errors->first('spread_yoi_untuk_si') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.spread_yoi_untuk_si_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('counter_rate') ? 'has-error' : '' }}">
                            <label class="required" for="counter_rate">{{ trans('cruds.generalAssumption.fields.counter_rate') }}</label>
                            <input class="form-control" type="number" name="counter_rate" id="counter_rate" value="{{ old('counter_rate', $generalAssumption->counter_rate) }}" step="0.01" required>
                            @if($errors->has('counter_rate'))
                                <span class="help-block" role="alert">{{ $errors->first('counter_rate') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.counter_rate_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('spread_counter_rate') ? 'has-error' : '' }}">
                            <label class="required" for="spread_counter_rate">{{ trans('cruds.generalAssumption.fields.spread_counter_rate') }}</label>
                            <input class="form-control" type="number" name="spread_counter_rate" id="spread_counter_rate" value="{{ old('spread_counter_rate', $generalAssumption->spread_counter_rate) }}" step="0.01" required>
                            @if($errors->has('spread_counter_rate'))
                                <span class="help-block" role="alert">{{ $errors->first('spread_counter_rate') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.spread_counter_rate_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tenor_saham') ? 'has-error' : '' }}">
                            <label class="required" for="tenor_saham">{{ trans('cruds.generalAssumption.fields.tenor_saham') }}</label>
                            <input class="form-control" type="number" name="tenor_saham" id="tenor_saham" value="{{ old('tenor_saham', $generalAssumption->tenor_saham) }}" step="0.01" required>
                            @if($errors->has('tenor_saham'))
                                <span class="help-block" role="alert">{{ $errors->first('tenor_saham') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.tenor_saham_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tenor_reksadana') ? 'has-error' : '' }}">
                            <label class="required" for="tenor_reksadana">{{ trans('cruds.generalAssumption.fields.tenor_reksadana') }}</label>
                            <input class="form-control" type="number" name="tenor_reksadana" id="tenor_reksadana" value="{{ old('tenor_reksadana', $generalAssumption->tenor_reksadana) }}" step="0.01" required>
                            @if($errors->has('tenor_reksadana'))
                                <span class="help-block" role="alert">{{ $errors->first('tenor_reksadana') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.tenor_reksadana_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tenor_inv_langsung') ? 'has-error' : '' }}">
                            <label class="required" for="tenor_inv_langsung">{{ trans('cruds.generalAssumption.fields.tenor_inv_langsung') }}</label>
                            <input class="form-control" type="number" name="tenor_inv_langsung" id="tenor_inv_langsung" value="{{ old('tenor_inv_langsung', $generalAssumption->tenor_inv_langsung) }}" step="0.01" required>
                            @if($errors->has('tenor_inv_langsung'))
                                <span class="help-block" role="alert">{{ $errors->first('tenor_inv_langsung') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.tenor_inv_langsung_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('capital_gain_saham') ? 'has-error' : '' }}">
                            <label class="required" for="capital_gain_saham">{{ trans('cruds.generalAssumption.fields.capital_gain_saham') }}</label>
                            <input class="form-control" type="number" name="capital_gain_saham" id="capital_gain_saham" value="{{ old('capital_gain_saham', $generalAssumption->capital_gain_saham) }}" step="0.01" required>
                            @if($errors->has('capital_gain_saham'))
                                <span class="help-block" role="alert">{{ $errors->first('capital_gain_saham') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.capital_gain_saham_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('capital_gain_reksadana') ? 'has-error' : '' }}">
                            <label class="required" for="capital_gain_reksadana">{{ trans('cruds.generalAssumption.fields.capital_gain_reksadana') }}</label>
                            <input class="form-control" type="number" name="capital_gain_reksadana" id="capital_gain_reksadana" value="{{ old('capital_gain_reksadana', $generalAssumption->capital_gain_reksadana) }}" step="0.01" required>
                            @if($errors->has('capital_gain_reksadana'))
                                <span class="help-block" role="alert">{{ $errors->first('capital_gain_reksadana') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.capital_gain_reksadana_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('capital_gain_inv_langsung') ? 'has-error' : '' }}">
                            <label class="required" for="capital_gain_inv_langsung">{{ trans('cruds.generalAssumption.fields.capital_gain_inv_langsung') }}</label>
                            <input class="form-control" type="number" name="capital_gain_inv_langsung" id="capital_gain_inv_langsung" value="{{ old('capital_gain_inv_langsung', $generalAssumption->capital_gain_inv_langsung) }}" step="0.01" required>
                            @if($errors->has('capital_gain_inv_langsung'))
                                <span class="help-block" role="alert">{{ $errors->first('capital_gain_inv_langsung') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.capital_gain_inv_langsung_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('market_cap_saham') ? 'has-error' : '' }}">
                            <label class="required" for="market_cap_saham">{{ trans('cruds.generalAssumption.fields.market_cap_saham') }}</label>
                            <input class="form-control" type="number" name="market_cap_saham" id="market_cap_saham" value="{{ old('market_cap_saham', $generalAssumption->market_cap_saham) }}" step="0.01" required>
                            @if($errors->has('market_cap_saham'))
                                <span class="help-block" role="alert">{{ $errors->first('market_cap_saham') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.market_cap_saham_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('capital_gain_rdpt') ? 'has-error' : '' }}">
                            <label class="required" for="capital_gain_rdpt">{{ trans('cruds.generalAssumption.fields.capital_gain_rdpt') }}</label>
                            <input class="form-control" type="number" name="capital_gain_rdpt" id="capital_gain_rdpt" value="{{ old('capital_gain_rdpt', $generalAssumption->capital_gain_rdpt) }}" step="0.01" required>
                            @if($errors->has('capital_gain_rdpt'))
                                <span class="help-block" role="alert">{{ $errors->first('capital_gain_rdpt') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.generalAssumption.fields.capital_gain_rdpt_helper') }}</span>
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