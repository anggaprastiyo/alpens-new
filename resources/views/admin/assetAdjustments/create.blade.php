@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.assetAdjustment.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.asset-adjustments.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('portfolio_date') ? 'has-error' : '' }}">
                            <label for="portfolio_date">{{ trans('cruds.assetAdjustment.fields.portfolio_date') }}</label>
                            <input class="form-control date" type="text" name="portfolio_date" id="portfolio_date" value="{{ old('portfolio_date') }}">
                            @if($errors->has('portfolio_date'))
                                <span class="help-block" role="alert">{{ $errors->first('portfolio_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.portfolio_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tipe_asset') ? 'has-error' : '' }}">
                            <label for="tipe_asset">{{ trans('cruds.assetAdjustment.fields.tipe_asset') }}</label>
                            <input class="form-control" type="text" name="tipe_asset" id="tipe_asset" value="{{ old('tipe_asset', '') }}">
                            @if($errors->has('tipe_asset'))
                                <span class="help-block" role="alert">{{ $errors->first('tipe_asset') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.tipe_asset_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('program') ? 'has-error' : '' }}">
                            <label for="program">{{ trans('cruds.assetAdjustment.fields.program') }}</label>
                            <input class="form-control" type="text" name="program" id="program" value="{{ old('program', '') }}">
                            @if($errors->has('program'))
                                <span class="help-block" role="alert">{{ $errors->first('program') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.program_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level_1') ? 'has-error' : '' }}">
                            <label for="level_1">{{ trans('cruds.assetAdjustment.fields.level_1') }}</label>
                            <input class="form-control" type="text" name="level_1" id="level_1" value="{{ old('level_1', '') }}">
                            @if($errors->has('level_1'))
                                <span class="help-block" role="alert">{{ $errors->first('level_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.level_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level_2') ? 'has-error' : '' }}">
                            <label for="level_2">{{ trans('cruds.assetAdjustment.fields.level_2') }}</label>
                            <input class="form-control" type="text" name="level_2" id="level_2" value="{{ old('level_2', '') }}">
                            @if($errors->has('level_2'))
                                <span class="help-block" role="alert">{{ $errors->first('level_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.level_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level_3') ? 'has-error' : '' }}">
                            <label for="level_3">{{ trans('cruds.assetAdjustment.fields.level_3') }}</label>
                            <input class="form-control" type="text" name="level_3" id="level_3" value="{{ old('level_3', '') }}">
                            @if($errors->has('level_3'))
                                <span class="help-block" role="alert">{{ $errors->first('level_3') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.level_3_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ticker') ? 'has-error' : '' }}">
                            <label for="ticker">{{ trans('cruds.assetAdjustment.fields.ticker') }}</label>
                            <input class="form-control" type="text" name="ticker" id="ticker" value="{{ old('ticker', '') }}">
                            @if($errors->has('ticker'))
                                <span class="help-block" role="alert">{{ $errors->first('ticker') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.ticker_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.assetAdjustment.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama_bank') ? 'has-error' : '' }}">
                            <label for="nama_bank">{{ trans('cruds.assetAdjustment.fields.nama_bank') }}</label>
                            <input class="form-control" type="text" name="nama_bank" id="nama_bank" value="{{ old('nama_bank', '') }}">
                            @if($errors->has('nama_bank'))
                                <span class="help-block" role="alert">{{ $errors->first('nama_bank') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.nama_bank_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nomor_bilyet') ? 'has-error' : '' }}">
                            <label for="nomor_bilyet">{{ trans('cruds.assetAdjustment.fields.nomor_bilyet') }}</label>
                            <input class="form-control" type="text" name="nomor_bilyet" id="nomor_bilyet" value="{{ old('nomor_bilyet', '') }}">
                            @if($errors->has('nomor_bilyet'))
                                <span class="help-block" role="alert">{{ $errors->first('nomor_bilyet') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.nomor_bilyet_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama_mi') ? 'has-error' : '' }}">
                            <label for="nama_mi">{{ trans('cruds.assetAdjustment.fields.nama_mi') }}</label>
                            <input class="form-control" type="text" name="nama_mi" id="nama_mi" value="{{ old('nama_mi', '') }}">
                            @if($errors->has('nama_mi'))
                                <span class="help-block" role="alert">{{ $errors->first('nama_mi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.nama_mi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rating') ? 'has-error' : '' }}">
                            <label for="rating">{{ trans('cruds.assetAdjustment.fields.rating') }}</label>
                            <input class="form-control" type="text" name="rating" id="rating" value="{{ old('rating', '') }}">
                            @if($errors->has('rating'))
                                <span class="help-block" role="alert">{{ $errors->first('rating') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.rating_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal_perolehan') ? 'has-error' : '' }}">
                            <label for="tanggal_perolehan">{{ trans('cruds.assetAdjustment.fields.tanggal_perolehan') }}</label>
                            <input class="form-control" type="text" name="tanggal_perolehan" id="tanggal_perolehan" value="{{ old('tanggal_perolehan', '') }}">
                            @if($errors->has('tanggal_perolehan'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal_perolehan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.tanggal_perolehan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal_maturity') ? 'has-error' : '' }}">
                            <label for="tanggal_maturity">{{ trans('cruds.assetAdjustment.fields.tanggal_maturity') }}</label>
                            <input class="form-control" type="text" name="tanggal_maturity" id="tanggal_maturity" value="{{ old('tanggal_maturity', '') }}">
                            @if($errors->has('tanggal_maturity'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal_maturity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.tanggal_maturity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nilai_nominal') ? 'has-error' : '' }}">
                            <label for="nilai_nominal">{{ trans('cruds.assetAdjustment.fields.nilai_nominal') }}</label>
                            <input class="form-control" type="number" name="nilai_nominal" id="nilai_nominal" value="{{ old('nilai_nominal', '') }}" step="0.01">
                            @if($errors->has('nilai_nominal'))
                                <span class="help-block" role="alert">{{ $errors->first('nilai_nominal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.nilai_nominal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nilai_perolehan') ? 'has-error' : '' }}">
                            <label for="nilai_perolehan">{{ trans('cruds.assetAdjustment.fields.nilai_perolehan') }}</label>
                            <input class="form-control" type="number" name="nilai_perolehan" id="nilai_perolehan" value="{{ old('nilai_perolehan', '') }}" step="0.01">
                            @if($errors->has('nilai_perolehan'))
                                <span class="help-block" role="alert">{{ $errors->first('nilai_perolehan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.nilai_perolehan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('harga_perolehan') ? 'has-error' : '' }}">
                            <label for="harga_perolehan">{{ trans('cruds.assetAdjustment.fields.harga_perolehan') }}</label>
                            <input class="form-control" type="number" name="harga_perolehan" id="harga_perolehan" value="{{ old('harga_perolehan', '') }}" step="0.01">
                            @if($errors->has('harga_perolehan'))
                                <span class="help-block" role="alert">{{ $errors->first('harga_perolehan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.harga_perolehan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kupon') ? 'has-error' : '' }}">
                            <label for="kupon">{{ trans('cruds.assetAdjustment.fields.kupon') }}</label>
                            <input class="form-control" type="number" name="kupon" id="kupon" value="{{ old('kupon', '') }}" step="0.01">
                            @if($errors->has('kupon'))
                                <span class="help-block" role="alert">{{ $errors->first('kupon') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.kupon_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pembagian_kupon') ? 'has-error' : '' }}">
                            <label for="pembagian_kupon">{{ trans('cruds.assetAdjustment.fields.pembagian_kupon') }}</label>
                            <input class="form-control" type="number" name="pembagian_kupon" id="pembagian_kupon" value="{{ old('pembagian_kupon', '') }}" step="1">
                            @if($errors->has('pembagian_kupon'))
                                <span class="help-block" role="alert">{{ $errors->first('pembagian_kupon') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.pembagian_kupon_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bunga') ? 'has-error' : '' }}">
                            <label for="bunga">{{ trans('cruds.assetAdjustment.fields.bunga') }}</label>
                            <input class="form-control" type="number" name="bunga" id="bunga" value="{{ old('bunga', '') }}" step="0.01">
                            @if($errors->has('bunga'))
                                <span class="help-block" role="alert">{{ $errors->first('bunga') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.bunga_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pembagian_bunga') ? 'has-error' : '' }}">
                            <label for="pembagian_bunga">{{ trans('cruds.assetAdjustment.fields.pembagian_bunga') }}</label>
                            <input class="form-control" type="text" name="pembagian_bunga" id="pembagian_bunga" value="{{ old('pembagian_bunga', '') }}">
                            @if($errors->has('pembagian_bunga'))
                                <span class="help-block" role="alert">{{ $errors->first('pembagian_bunga') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.pembagian_bunga_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('harga_pasar') ? 'has-error' : '' }}">
                            <label for="harga_pasar">{{ trans('cruds.assetAdjustment.fields.harga_pasar') }}</label>
                            <input class="form-control" type="number" name="harga_pasar" id="harga_pasar" value="{{ old('harga_pasar', '') }}" step="0.01">
                            @if($errors->has('harga_pasar'))
                                <span class="help-block" role="alert">{{ $errors->first('harga_pasar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.harga_pasar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nilai_pasar') ? 'has-error' : '' }}">
                            <label for="nilai_pasar">{{ trans('cruds.assetAdjustment.fields.nilai_pasar') }}</label>
                            <input class="form-control" type="number" name="nilai_pasar" id="nilai_pasar" value="{{ old('nilai_pasar', '') }}" step="0.01">
                            @if($errors->has('nilai_pasar'))
                                <span class="help-block" role="alert">{{ $errors->first('nilai_pasar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.nilai_pasar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nilai_tercatat') ? 'has-error' : '' }}">
                            <label for="nilai_tercatat">{{ trans('cruds.assetAdjustment.fields.nilai_tercatat') }}</label>
                            <input class="form-control" type="number" name="nilai_tercatat" id="nilai_tercatat" value="{{ old('nilai_tercatat', '') }}" step="0.01">
                            @if($errors->has('nilai_tercatat'))
                                <span class="help-block" role="alert">{{ $errors->first('nilai_tercatat') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.nilai_tercatat_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('potential') ? 'has-error' : '' }}">
                            <label for="potential">{{ trans('cruds.assetAdjustment.fields.potential') }}</label>
                            <input class="form-control" type="number" name="potential" id="potential" value="{{ old('potential', '') }}" step="0.01">
                            @if($errors->has('potential'))
                                <span class="help-block" role="alert">{{ $errors->first('potential') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.potential_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lembar_saham') ? 'has-error' : '' }}">
                            <label for="lembar_saham">{{ trans('cruds.assetAdjustment.fields.lembar_saham') }}</label>
                            <input class="form-control" type="number" name="lembar_saham" id="lembar_saham" value="{{ old('lembar_saham', '') }}" step="1">
                            @if($errors->has('lembar_saham'))
                                <span class="help-block" role="alert">{{ $errors->first('lembar_saham') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.lembar_saham_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('deviden_saham') ? 'has-error' : '' }}">
                            <label for="deviden_saham">{{ trans('cruds.assetAdjustment.fields.deviden_saham') }}</label>
                            <input class="form-control" type="number" name="deviden_saham" id="deviden_saham" value="{{ old('deviden_saham', '') }}" step="0.01">
                            @if($errors->has('deviden_saham'))
                                <span class="help-block" role="alert">{{ $errors->first('deviden_saham') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.deviden_saham_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pembagian_deviden_saham') ? 'has-error' : '' }}">
                            <label for="pembagian_deviden_saham">{{ trans('cruds.assetAdjustment.fields.pembagian_deviden_saham') }}</label>
                            <input class="form-control" type="number" name="pembagian_deviden_saham" id="pembagian_deviden_saham" value="{{ old('pembagian_deviden_saham', '') }}" step="1">
                            @if($errors->has('pembagian_deviden_saham'))
                                <span class="help-block" role="alert">{{ $errors->first('pembagian_deviden_saham') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.pembagian_deviden_saham_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('market_cap_saham') ? 'has-error' : '' }}">
                            <label for="market_cap_saham">{{ trans('cruds.assetAdjustment.fields.market_cap_saham') }}</label>
                            <input class="form-control" type="number" name="market_cap_saham" id="market_cap_saham" value="{{ old('market_cap_saham', '') }}" step="0.01">
                            @if($errors->has('market_cap_saham'))
                                <span class="help-block" role="alert">{{ $errors->first('market_cap_saham') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.market_cap_saham_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('type_reksadana') ? 'has-error' : '' }}">
                            <label for="type_reksadana">{{ trans('cruds.assetAdjustment.fields.type_reksadana') }}</label>
                            <input class="form-control" type="text" name="type_reksadana" id="type_reksadana" value="{{ old('type_reksadana', '') }}">
                            @if($errors->has('type_reksadana'))
                                <span class="help-block" role="alert">{{ $errors->first('type_reksadana') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.type_reksadana_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('unit_penyertaan') ? 'has-error' : '' }}">
                            <label for="unit_penyertaan">{{ trans('cruds.assetAdjustment.fields.unit_penyertaan') }}</label>
                            <input class="form-control" type="number" name="unit_penyertaan" id="unit_penyertaan" value="{{ old('unit_penyertaan', '') }}" step="0.01">
                            @if($errors->has('unit_penyertaan'))
                                <span class="help-block" role="alert">{{ $errors->first('unit_penyertaan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.unit_penyertaan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nab') ? 'has-error' : '' }}">
                            <label for="nab">{{ trans('cruds.assetAdjustment.fields.nab') }}</label>
                            <input class="form-control" type="number" name="nab" id="nab" value="{{ old('nab', '') }}" step="0.01">
                            @if($errors->has('nab'))
                                <span class="help-block" role="alert">{{ $errors->first('nab') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.nab_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('time_to_maturity') ? 'has-error' : '' }}">
                            <label for="time_to_maturity">{{ trans('cruds.assetAdjustment.fields.time_to_maturity') }}</label>
                            <input class="form-control" type="number" name="time_to_maturity" id="time_to_maturity" value="{{ old('time_to_maturity', '') }}" step="1">
                            @if($errors->has('time_to_maturity'))
                                <span class="help-block" role="alert">{{ $errors->first('time_to_maturity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.time_to_maturity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('yield_to_maturity') ? 'has-error' : '' }}">
                            <label for="yield_to_maturity">{{ trans('cruds.assetAdjustment.fields.yield_to_maturity') }}</label>
                            <input class="form-control" type="number" name="yield_to_maturity" id="yield_to_maturity" value="{{ old('yield_to_maturity', '') }}" step="0.01">
                            @if($errors->has('yield_to_maturity'))
                                <span class="help-block" role="alert">{{ $errors->first('yield_to_maturity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.yield_to_maturity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('faktor_pengurang') ? 'has-error' : '' }}">
                            <label for="faktor_pengurang">{{ trans('cruds.assetAdjustment.fields.faktor_pengurang') }}</label>
                            <input class="form-control" type="number" name="faktor_pengurang" id="faktor_pengurang" value="{{ old('faktor_pengurang', '') }}" step="0.01">
                            @if($errors->has('faktor_pengurang'))
                                <span class="help-block" role="alert">{{ $errors->first('faktor_pengurang') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.faktor_pengurang_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tenor') ? 'has-error' : '' }}">
                            <label for="tenor">{{ trans('cruds.assetAdjustment.fields.tenor') }}</label>
                            <input class="form-control" type="number" name="tenor" id="tenor" value="{{ old('tenor', '') }}" step="0.01">
                            @if($errors->has('tenor'))
                                <span class="help-block" role="alert">{{ $errors->first('tenor') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.tenor_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sisa_tenor') ? 'has-error' : '' }}">
                            <label for="sisa_tenor">{{ trans('cruds.assetAdjustment.fields.sisa_tenor') }}</label>
                            <input class="form-control" type="number" name="sisa_tenor" id="sisa_tenor" value="{{ old('sisa_tenor', '') }}" step="0.01">
                            @if($errors->has('sisa_tenor'))
                                <span class="help-block" role="alert">{{ $errors->first('sisa_tenor') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.sisa_tenor_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('macaulay_duration') ? 'has-error' : '' }}">
                            <label for="macaulay_duration">{{ trans('cruds.assetAdjustment.fields.macaulay_duration') }}</label>
                            <input class="form-control" type="number" name="macaulay_duration" id="macaulay_duration" value="{{ old('macaulay_duration', '') }}" step="0.01">
                            @if($errors->has('macaulay_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('macaulay_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.macaulay_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('modified_duration') ? 'has-error' : '' }}">
                            <label for="modified_duration">{{ trans('cruds.assetAdjustment.fields.modified_duration') }}</label>
                            <input class="form-control" type="number" name="modified_duration" id="modified_duration" value="{{ old('modified_duration', '') }}" step="0.01">
                            @if($errors->has('modified_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('modified_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.modified_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('convexity_apporximation') ? 'has-error' : '' }}">
                            <label for="convexity_apporximation">{{ trans('cruds.assetAdjustment.fields.convexity_apporximation') }}</label>
                            <input class="form-control" type="number" name="convexity_apporximation" id="convexity_apporximation" value="{{ old('convexity_apporximation', '') }}" step="0.01">
                            @if($errors->has('convexity_apporximation'))
                                <span class="help-block" role="alert">{{ $errors->first('convexity_apporximation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.convexity_apporximation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bobot_macaulay_duration') ? 'has-error' : '' }}">
                            <label for="bobot_macaulay_duration">{{ trans('cruds.assetAdjustment.fields.bobot_macaulay_duration') }}</label>
                            <input class="form-control" type="number" name="bobot_macaulay_duration" id="bobot_macaulay_duration" value="{{ old('bobot_macaulay_duration', '') }}" step="0.01">
                            @if($errors->has('bobot_macaulay_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('bobot_macaulay_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.bobot_macaulay_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bobot_modified_duration') ? 'has-error' : '' }}">
                            <label for="bobot_modified_duration">{{ trans('cruds.assetAdjustment.fields.bobot_modified_duration') }}</label>
                            <input class="form-control" type="number" name="bobot_modified_duration" id="bobot_modified_duration" value="{{ old('bobot_modified_duration', '') }}" step="0.01">
                            @if($errors->has('bobot_modified_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('bobot_modified_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.bobot_modified_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bobot_convexity_apporximation') ? 'has-error' : '' }}">
                            <label for="bobot_convexity_apporximation">{{ trans('cruds.assetAdjustment.fields.bobot_convexity_apporximation') }}</label>
                            <input class="form-control" type="number" name="bobot_convexity_apporximation" id="bobot_convexity_apporximation" value="{{ old('bobot_convexity_apporximation', '') }}" step="0.01">
                            @if($errors->has('bobot_convexity_apporximation'))
                                <span class="help-block" role="alert">{{ $errors->first('bobot_convexity_apporximation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.bobot_convexity_apporximation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal_saldo_awal') ? 'has-error' : '' }}">
                            <label for="tanggal_saldo_awal">{{ trans('cruds.assetAdjustment.fields.tanggal_saldo_awal') }}</label>
                            <input class="form-control date" type="text" name="tanggal_saldo_awal" id="tanggal_saldo_awal" value="{{ old('tanggal_saldo_awal') }}">
                            @if($errors->has('tanggal_saldo_awal'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal_saldo_awal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.tanggal_saldo_awal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal_add_set_modal') ? 'has-error' : '' }}">
                            <label for="tanggal_add_set_modal">{{ trans('cruds.assetAdjustment.fields.tanggal_add_set_modal') }}</label>
                            <input class="form-control date" type="text" name="tanggal_add_set_modal" id="tanggal_add_set_modal" value="{{ old('tanggal_add_set_modal') }}">
                            @if($errors->has('tanggal_add_set_modal'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal_add_set_modal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.tanggal_add_set_modal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nilai_investasi') ? 'has-error' : '' }}">
                            <label for="nilai_investasi">{{ trans('cruds.assetAdjustment.fields.nilai_investasi') }}</label>
                            <input class="form-control" type="number" name="nilai_investasi" id="nilai_investasi" value="{{ old('nilai_investasi', '') }}" step="0.01">
                            @if($errors->has('nilai_investasi'))
                                <span class="help-block" role="alert">{{ $errors->first('nilai_investasi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.nilai_investasi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pelunasan_shl') ? 'has-error' : '' }}">
                            <label for="pelunasan_shl">{{ trans('cruds.assetAdjustment.fields.pelunasan_shl') }}</label>
                            <input class="form-control" type="number" name="pelunasan_shl" id="pelunasan_shl" value="{{ old('pelunasan_shl', '') }}" step="0.01">
                            @if($errors->has('pelunasan_shl'))
                                <span class="help-block" role="alert">{{ $errors->first('pelunasan_shl') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.pelunasan_shl_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tambahan_setoran_modal') ? 'has-error' : '' }}">
                            <label for="tambahan_setoran_modal">{{ trans('cruds.assetAdjustment.fields.tambahan_setoran_modal') }}</label>
                            <input class="form-control" type="number" name="tambahan_setoran_modal" id="tambahan_setoran_modal" value="{{ old('tambahan_setoran_modal', '') }}" step="0.01">
                            @if($errors->has('tambahan_setoran_modal'))
                                <span class="help-block" role="alert">{{ $errors->first('tambahan_setoran_modal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.tambahan_setoran_modal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('div_yield_bunga') ? 'has-error' : '' }}">
                            <label for="div_yield_bunga">{{ trans('cruds.assetAdjustment.fields.div_yield_bunga') }}</label>
                            <input class="form-control" type="number" name="div_yield_bunga" id="div_yield_bunga" value="{{ old('div_yield_bunga', '') }}" step="0.01">
                            @if($errors->has('div_yield_bunga'))
                                <span class="help-block" role="alert">{{ $errors->first('div_yield_bunga') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.div_yield_bunga_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pembagian_div_yield_bunga') ? 'has-error' : '' }}">
                            <label for="pembagian_div_yield_bunga">{{ trans('cruds.assetAdjustment.fields.pembagian_div_yield_bunga') }}</label>
                            <input class="form-control" type="number" name="pembagian_div_yield_bunga" id="pembagian_div_yield_bunga" value="{{ old('pembagian_div_yield_bunga', '') }}" step="0.01">
                            @if($errors->has('pembagian_div_yield_bunga'))
                                <span class="help-block" role="alert">{{ $errors->first('pembagian_div_yield_bunga') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.pembagian_div_yield_bunga_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('projected_add_yield') ? 'has-error' : '' }}">
                            <label for="projected_add_yield">{{ trans('cruds.assetAdjustment.fields.projected_add_yield') }}</label>
                            <input class="form-control" type="number" name="projected_add_yield" id="projected_add_yield" value="{{ old('projected_add_yield', '') }}" step="0.01">
                            @if($errors->has('projected_add_yield'))
                                <span class="help-block" role="alert">{{ $errors->first('projected_add_yield') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.projected_add_yield_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('divestasi') ? 'has-error' : '' }}">
                            <label for="divestasi">{{ trans('cruds.assetAdjustment.fields.divestasi') }}</label>
                            <input class="form-control" type="number" name="divestasi" id="divestasi" value="{{ old('divestasi', '') }}" step="0.01">
                            @if($errors->has('divestasi'))
                                <span class="help-block" role="alert">{{ $errors->first('divestasi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.divestasi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal_divestasi') ? 'has-error' : '' }}">
                            <label for="tanggal_divestasi">{{ trans('cruds.assetAdjustment.fields.tanggal_divestasi') }}</label>
                            <input class="form-control date" type="text" name="tanggal_divestasi" id="tanggal_divestasi" value="{{ old('tanggal_divestasi') }}">
                            @if($errors->has('tanggal_divestasi'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal_divestasi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.tanggal_divestasi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('harga_perolehan_divestasi') ? 'has-error' : '' }}">
                            <label for="harga_perolehan_divestasi">{{ trans('cruds.assetAdjustment.fields.harga_perolehan_divestasi') }}</label>
                            <input class="form-control" type="number" name="harga_perolehan_divestasi" id="harga_perolehan_divestasi" value="{{ old('harga_perolehan_divestasi', '') }}" step="0.01">
                            @if($errors->has('harga_perolehan_divestasi'))
                                <span class="help-block" role="alert">{{ $errors->first('harga_perolehan_divestasi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetAdjustment.fields.harga_perolehan_divestasi_helper') }}</span>
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