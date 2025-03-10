@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.investasiLangsung.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.investasi-langsungs.update", [$investasiLangsung->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('asset_migration') ? 'has-error' : '' }}">
                            <label class="required" for="asset_migration_id">{{ trans('cruds.investasiLangsung.fields.asset_migration') }}</label>
                            <select class="form-control select2" name="asset_migration_id" id="asset_migration_id" required>
                                @foreach($asset_migrations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('asset_migration_id') ? old('asset_migration_id') : $investasiLangsung->asset_migration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('asset_migration'))
                                <span class="help-block" role="alert">{{ $errors->first('asset_migration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.asset_migration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('program') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.investasiLangsung.fields.program') }}</label>
                            <select class="form-control" name="program" id="program" required>
                                <option value disabled {{ old('program', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\InvestasiLangsung::PROGRAM_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('program', $investasiLangsung->program) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('program'))
                                <span class="help-block" role="alert">{{ $errors->first('program') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.program_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level_1') ? 'has-error' : '' }}">
                            <label for="level_1">{{ trans('cruds.investasiLangsung.fields.level_1') }}</label>
                            <input class="form-control" type="text" name="level_1" id="level_1" value="{{ old('level_1', $investasiLangsung->level_1) }}">
                            @if($errors->has('level_1'))
                                <span class="help-block" role="alert">{{ $errors->first('level_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.level_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level_2') ? 'has-error' : '' }}">
                            <label for="level_2">{{ trans('cruds.investasiLangsung.fields.level_2') }}</label>
                            <input class="form-control" type="text" name="level_2" id="level_2" value="{{ old('level_2', $investasiLangsung->level_2) }}">
                            @if($errors->has('level_2'))
                                <span class="help-block" role="alert">{{ $errors->first('level_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.level_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level_3') ? 'has-error' : '' }}">
                            <label for="level_3">{{ trans('cruds.investasiLangsung.fields.level_3') }}</label>
                            <input class="form-control" type="text" name="level_3" id="level_3" value="{{ old('level_3', $investasiLangsung->level_3) }}">
                            @if($errors->has('level_3'))
                                <span class="help-block" role="alert">{{ $errors->first('level_3') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.level_3_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.investasiLangsung.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $investasiLangsung->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nilai_pasar') ? 'has-error' : '' }}">
                            <label for="nilai_pasar">{{ trans('cruds.investasiLangsung.fields.nilai_pasar') }}</label>
                            <input class="form-control" type="number" name="nilai_pasar" id="nilai_pasar" value="{{ old('nilai_pasar', $investasiLangsung->nilai_pasar) }}" step="0.01">
                            @if($errors->has('nilai_pasar'))
                                <span class="help-block" role="alert">{{ $errors->first('nilai_pasar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.nilai_pasar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('market_cap_saham') ? 'has-error' : '' }}">
                            <label for="market_cap_saham">{{ trans('cruds.investasiLangsung.fields.market_cap_saham') }}</label>
                            <input class="form-control" type="number" name="market_cap_saham" id="market_cap_saham" value="{{ old('market_cap_saham', $investasiLangsung->market_cap_saham) }}" step="0.01">
                            @if($errors->has('market_cap_saham'))
                                <span class="help-block" role="alert">{{ $errors->first('market_cap_saham') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.market_cap_saham_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('convexity_apporximation') ? 'has-error' : '' }}">
                            <label for="convexity_apporximation">{{ trans('cruds.investasiLangsung.fields.convexity_apporximation') }}</label>
                            <input class="form-control" type="number" name="convexity_apporximation" id="convexity_apporximation" value="{{ old('convexity_apporximation', $investasiLangsung->convexity_apporximation) }}" step="0.01">
                            @if($errors->has('convexity_apporximation'))
                                <span class="help-block" role="alert">{{ $errors->first('convexity_apporximation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.convexity_apporximation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bobot_macaulay_duration') ? 'has-error' : '' }}">
                            <label for="bobot_macaulay_duration">{{ trans('cruds.investasiLangsung.fields.bobot_macaulay_duration') }}</label>
                            <input class="form-control" type="number" name="bobot_macaulay_duration" id="bobot_macaulay_duration" value="{{ old('bobot_macaulay_duration', $investasiLangsung->bobot_macaulay_duration) }}" step="0.01">
                            @if($errors->has('bobot_macaulay_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('bobot_macaulay_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.bobot_macaulay_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bobot_modified_duration') ? 'has-error' : '' }}">
                            <label for="bobot_modified_duration">{{ trans('cruds.investasiLangsung.fields.bobot_modified_duration') }}</label>
                            <input class="form-control" type="number" name="bobot_modified_duration" id="bobot_modified_duration" value="{{ old('bobot_modified_duration', $investasiLangsung->bobot_modified_duration) }}" step="0.01">
                            @if($errors->has('bobot_modified_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('bobot_modified_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.bobot_modified_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bobot_convexity_apporximation') ? 'has-error' : '' }}">
                            <label for="bobot_convexity_apporximation">{{ trans('cruds.investasiLangsung.fields.bobot_convexity_apporximation') }}</label>
                            <input class="form-control" type="number" name="bobot_convexity_apporximation" id="bobot_convexity_apporximation" value="{{ old('bobot_convexity_apporximation', $investasiLangsung->bobot_convexity_apporximation) }}" step="0.01">
                            @if($errors->has('bobot_convexity_apporximation'))
                                <span class="help-block" role="alert">{{ $errors->first('bobot_convexity_apporximation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.bobot_convexity_apporximation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal_saldo_awal') ? 'has-error' : '' }}">
                            <label for="tanggal_saldo_awal">{{ trans('cruds.investasiLangsung.fields.tanggal_saldo_awal') }}</label>
                            <input class="form-control date" type="text" name="tanggal_saldo_awal" id="tanggal_saldo_awal" value="{{ old('tanggal_saldo_awal', $investasiLangsung->tanggal_saldo_awal) }}">
                            @if($errors->has('tanggal_saldo_awal'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal_saldo_awal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.tanggal_saldo_awal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal_add_set_modal') ? 'has-error' : '' }}">
                            <label for="tanggal_add_set_modal">{{ trans('cruds.investasiLangsung.fields.tanggal_add_set_modal') }}</label>
                            <input class="form-control date" type="text" name="tanggal_add_set_modal" id="tanggal_add_set_modal" value="{{ old('tanggal_add_set_modal', $investasiLangsung->tanggal_add_set_modal) }}">
                            @if($errors->has('tanggal_add_set_modal'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal_add_set_modal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.tanggal_add_set_modal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nilai_investasi') ? 'has-error' : '' }}">
                            <label for="nilai_investasi">{{ trans('cruds.investasiLangsung.fields.nilai_investasi') }}</label>
                            <input class="form-control" type="number" name="nilai_investasi" id="nilai_investasi" value="{{ old('nilai_investasi', $investasiLangsung->nilai_investasi) }}" step="0.01">
                            @if($errors->has('nilai_investasi'))
                                <span class="help-block" role="alert">{{ $errors->first('nilai_investasi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.nilai_investasi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pelunasan_shl') ? 'has-error' : '' }}">
                            <label for="pelunasan_shl">{{ trans('cruds.investasiLangsung.fields.pelunasan_shl') }}</label>
                            <input class="form-control" type="number" name="pelunasan_shl" id="pelunasan_shl" value="{{ old('pelunasan_shl', $investasiLangsung->pelunasan_shl) }}" step="0.01">
                            @if($errors->has('pelunasan_shl'))
                                <span class="help-block" role="alert">{{ $errors->first('pelunasan_shl') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.pelunasan_shl_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tambahan_setoran_modal') ? 'has-error' : '' }}">
                            <label for="tambahan_setoran_modal">{{ trans('cruds.investasiLangsung.fields.tambahan_setoran_modal') }}</label>
                            <input class="form-control" type="number" name="tambahan_setoran_modal" id="tambahan_setoran_modal" value="{{ old('tambahan_setoran_modal', $investasiLangsung->tambahan_setoran_modal) }}" step="0.01">
                            @if($errors->has('tambahan_setoran_modal'))
                                <span class="help-block" role="alert">{{ $errors->first('tambahan_setoran_modal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.tambahan_setoran_modal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('div_yield_bunga') ? 'has-error' : '' }}">
                            <label for="div_yield_bunga">{{ trans('cruds.investasiLangsung.fields.div_yield_bunga') }}</label>
                            <input class="form-control" type="number" name="div_yield_bunga" id="div_yield_bunga" value="{{ old('div_yield_bunga', $investasiLangsung->div_yield_bunga) }}" step="0.01">
                            @if($errors->has('div_yield_bunga'))
                                <span class="help-block" role="alert">{{ $errors->first('div_yield_bunga') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.div_yield_bunga_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pembagian_div_yield_bunga') ? 'has-error' : '' }}">
                            <label for="pembagian_div_yield_bunga">{{ trans('cruds.investasiLangsung.fields.pembagian_div_yield_bunga') }}</label>
                            <input class="form-control" type="number" name="pembagian_div_yield_bunga" id="pembagian_div_yield_bunga" value="{{ old('pembagian_div_yield_bunga', $investasiLangsung->pembagian_div_yield_bunga) }}" step="0.01">
                            @if($errors->has('pembagian_div_yield_bunga'))
                                <span class="help-block" role="alert">{{ $errors->first('pembagian_div_yield_bunga') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.pembagian_div_yield_bunga_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('projected_add_yield') ? 'has-error' : '' }}">
                            <label for="projected_add_yield">{{ trans('cruds.investasiLangsung.fields.projected_add_yield') }}</label>
                            <input class="form-control" type="number" name="projected_add_yield" id="projected_add_yield" value="{{ old('projected_add_yield', $investasiLangsung->projected_add_yield) }}" step="0.01">
                            @if($errors->has('projected_add_yield'))
                                <span class="help-block" role="alert">{{ $errors->first('projected_add_yield') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.projected_add_yield_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('divestasi') ? 'has-error' : '' }}">
                            <label for="divestasi">{{ trans('cruds.investasiLangsung.fields.divestasi') }}</label>
                            <input class="form-control" type="number" name="divestasi" id="divestasi" value="{{ old('divestasi', $investasiLangsung->divestasi) }}" step="0.01">
                            @if($errors->has('divestasi'))
                                <span class="help-block" role="alert">{{ $errors->first('divestasi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.divestasi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal_divestasi') ? 'has-error' : '' }}">
                            <label for="tanggal_divestasi">{{ trans('cruds.investasiLangsung.fields.tanggal_divestasi') }}</label>
                            <input class="form-control date" type="text" name="tanggal_divestasi" id="tanggal_divestasi" value="{{ old('tanggal_divestasi', $investasiLangsung->tanggal_divestasi) }}">
                            @if($errors->has('tanggal_divestasi'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal_divestasi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.tanggal_divestasi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('harga_perolehan_divestasi') ? 'has-error' : '' }}">
                            <label for="harga_perolehan_divestasi">{{ trans('cruds.investasiLangsung.fields.harga_perolehan_divestasi') }}</label>
                            <input class="form-control" type="number" name="harga_perolehan_divestasi" id="harga_perolehan_divestasi" value="{{ old('harga_perolehan_divestasi', $investasiLangsung->harga_perolehan_divestasi) }}" step="0.01">
                            @if($errors->has('harga_perolehan_divestasi'))
                                <span class="help-block" role="alert">{{ $errors->first('harga_perolehan_divestasi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.harga_perolehan_divestasi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('modified_duration') ? 'has-error' : '' }}">
                            <label for="modified_duration">{{ trans('cruds.investasiLangsung.fields.modified_duration') }}</label>
                            <input class="form-control" type="number" name="modified_duration" id="modified_duration" value="{{ old('modified_duration', $investasiLangsung->modified_duration) }}" step="0.01">
                            @if($errors->has('modified_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('modified_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.modified_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('macaulay_duration') ? 'has-error' : '' }}">
                            <label for="macaulay_duration">{{ trans('cruds.investasiLangsung.fields.macaulay_duration') }}</label>
                            <input class="form-control" type="number" name="macaulay_duration" id="macaulay_duration" value="{{ old('macaulay_duration', $investasiLangsung->macaulay_duration) }}" step="0.01">
                            @if($errors->has('macaulay_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('macaulay_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.macaulay_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('last_edited_by') ? 'has-error' : '' }}">
                            <label for="last_edited_by">{{ trans('cruds.investasiLangsung.fields.last_edited_by') }}</label>
                            <input class="form-control" type="text" name="last_edited_by" id="last_edited_by" value="{{ old('last_edited_by', $investasiLangsung->last_edited_by) }}">
                            @if($errors->has('last_edited_by'))
                                <span class="help-block" role="alert">{{ $errors->first('last_edited_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.last_edited_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_updated') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_updated" value="0">
                                <input type="checkbox" name="is_updated" id="is_updated" value="1" {{ $investasiLangsung->is_updated || old('is_updated', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_updated" style="font-weight: 400">{{ trans('cruds.investasiLangsung.fields.is_updated') }}</label>
                            </div>
                            @if($errors->has('is_updated'))
                                <span class="help-block" role="alert">{{ $errors->first('is_updated') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.is_updated_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_new') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_new" value="0">
                                <input type="checkbox" name="is_new" id="is_new" value="1" {{ $investasiLangsung->is_new || old('is_new', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_new" style="font-weight: 400">{{ trans('cruds.investasiLangsung.fields.is_new') }}</label>
                            </div>
                            @if($errors->has('is_new'))
                                <span class="help-block" role="alert">{{ $errors->first('is_new') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.investasiLangsung.fields.is_new_helper') }}</span>
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