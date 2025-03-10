@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.obligasi.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.obligasis.update", [$obligasi->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('asset_migration') ? 'has-error' : '' }}">
                            <label class="required" for="asset_migration_id">{{ trans('cruds.obligasi.fields.asset_migration') }}</label>
                            <select class="form-control select2" name="asset_migration_id" id="asset_migration_id" required>
                                @foreach($asset_migrations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('asset_migration_id') ? old('asset_migration_id') : $obligasi->asset_migration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('asset_migration'))
                                <span class="help-block" role="alert">{{ $errors->first('asset_migration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.asset_migration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('program') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.obligasi.fields.program') }}</label>
                            <select class="form-control" name="program" id="program" required>
                                <option value disabled {{ old('program', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Obligasi::PROGRAM_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('program', $obligasi->program) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('program'))
                                <span class="help-block" role="alert">{{ $errors->first('program') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.program_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level_1') ? 'has-error' : '' }}">
                            <label for="level_1">{{ trans('cruds.obligasi.fields.level_1') }}</label>
                            <input class="form-control" type="text" name="level_1" id="level_1" value="{{ old('level_1', $obligasi->level_1) }}">
                            @if($errors->has('level_1'))
                                <span class="help-block" role="alert">{{ $errors->first('level_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.level_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level_2') ? 'has-error' : '' }}">
                            <label for="level_2">{{ trans('cruds.obligasi.fields.level_2') }}</label>
                            <input class="form-control" type="text" name="level_2" id="level_2" value="{{ old('level_2', $obligasi->level_2) }}">
                            @if($errors->has('level_2'))
                                <span class="help-block" role="alert">{{ $errors->first('level_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.level_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level_3') ? 'has-error' : '' }}">
                            <label for="level_3">{{ trans('cruds.obligasi.fields.level_3') }}</label>
                            <input class="form-control" type="text" name="level_3" id="level_3" value="{{ old('level_3', $obligasi->level_3) }}">
                            @if($errors->has('level_3'))
                                <span class="help-block" role="alert">{{ $errors->first('level_3') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.level_3_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ticker') ? 'has-error' : '' }}">
                            <label class="required" for="ticker">{{ trans('cruds.obligasi.fields.ticker') }}</label>
                            <input class="form-control" type="text" name="ticker" id="ticker" value="{{ old('ticker', $obligasi->ticker) }}" required>
                            @if($errors->has('ticker'))
                                <span class="help-block" role="alert">{{ $errors->first('ticker') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.ticker_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.obligasi.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $obligasi->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('rating') ? 'has-error' : '' }}">
                            <label for="rating">{{ trans('cruds.obligasi.fields.rating') }}</label>
                            <input class="form-control" type="text" name="rating" id="rating" value="{{ old('rating', $obligasi->rating) }}">
                            @if($errors->has('rating'))
                                <span class="help-block" role="alert">{{ $errors->first('rating') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.rating_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal_perolehan') ? 'has-error' : '' }}">
                            <label for="tanggal_perolehan">{{ trans('cruds.obligasi.fields.tanggal_perolehan') }}</label>
                            <input class="form-control date" type="text" name="tanggal_perolehan" id="tanggal_perolehan" value="{{ old('tanggal_perolehan', $obligasi->tanggal_perolehan) }}">
                            @if($errors->has('tanggal_perolehan'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal_perolehan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.tanggal_perolehan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal_maturity') ? 'has-error' : '' }}">
                            <label for="tanggal_maturity">{{ trans('cruds.obligasi.fields.tanggal_maturity') }}</label>
                            <input class="form-control date" type="text" name="tanggal_maturity" id="tanggal_maturity" value="{{ old('tanggal_maturity', $obligasi->tanggal_maturity) }}">
                            @if($errors->has('tanggal_maturity'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal_maturity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.tanggal_maturity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nilai_nominal') ? 'has-error' : '' }}">
                            <label for="nilai_nominal">{{ trans('cruds.obligasi.fields.nilai_nominal') }}</label>
                            <input class="form-control" type="number" name="nilai_nominal" id="nilai_nominal" value="{{ old('nilai_nominal', $obligasi->nilai_nominal) }}" step="0.01">
                            @if($errors->has('nilai_nominal'))
                                <span class="help-block" role="alert">{{ $errors->first('nilai_nominal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.nilai_nominal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nilai_perolehan') ? 'has-error' : '' }}">
                            <label for="nilai_perolehan">{{ trans('cruds.obligasi.fields.nilai_perolehan') }}</label>
                            <input class="form-control" type="number" name="nilai_perolehan" id="nilai_perolehan" value="{{ old('nilai_perolehan', $obligasi->nilai_perolehan) }}" step="0.01">
                            @if($errors->has('nilai_perolehan'))
                                <span class="help-block" role="alert">{{ $errors->first('nilai_perolehan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.nilai_perolehan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('harga_perolehan') ? 'has-error' : '' }}">
                            <label for="harga_perolehan">{{ trans('cruds.obligasi.fields.harga_perolehan') }}</label>
                            <input class="form-control" type="number" name="harga_perolehan" id="harga_perolehan" value="{{ old('harga_perolehan', $obligasi->harga_perolehan) }}" step="0.01">
                            @if($errors->has('harga_perolehan'))
                                <span class="help-block" role="alert">{{ $errors->first('harga_perolehan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.harga_perolehan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('kupon') ? 'has-error' : '' }}">
                            <label for="kupon">{{ trans('cruds.obligasi.fields.kupon') }}</label>
                            <input class="form-control" type="number" name="kupon" id="kupon" value="{{ old('kupon', $obligasi->kupon) }}" step="0.01">
                            @if($errors->has('kupon'))
                                <span class="help-block" role="alert">{{ $errors->first('kupon') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.kupon_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pembagian_kupon') ? 'has-error' : '' }}">
                            <label for="pembagian_kupon">{{ trans('cruds.obligasi.fields.pembagian_kupon') }}</label>
                            <input class="form-control" type="number" name="pembagian_kupon" id="pembagian_kupon" value="{{ old('pembagian_kupon', $obligasi->pembagian_kupon) }}" step="0.01">
                            @if($errors->has('pembagian_kupon'))
                                <span class="help-block" role="alert">{{ $errors->first('pembagian_kupon') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.pembagian_kupon_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('harga_pasar') ? 'has-error' : '' }}">
                            <label for="harga_pasar">{{ trans('cruds.obligasi.fields.harga_pasar') }}</label>
                            <input class="form-control" type="number" name="harga_pasar" id="harga_pasar" value="{{ old('harga_pasar', $obligasi->harga_pasar) }}" step="0.01">
                            @if($errors->has('harga_pasar'))
                                <span class="help-block" role="alert">{{ $errors->first('harga_pasar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.harga_pasar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nilai_pasar') ? 'has-error' : '' }}">
                            <label for="nilai_pasar">{{ trans('cruds.obligasi.fields.nilai_pasar') }}</label>
                            <input class="form-control" type="number" name="nilai_pasar" id="nilai_pasar" value="{{ old('nilai_pasar', $obligasi->nilai_pasar) }}" step="0.01">
                            @if($errors->has('nilai_pasar'))
                                <span class="help-block" role="alert">{{ $errors->first('nilai_pasar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.nilai_pasar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('yield_to_maturity') ? 'has-error' : '' }}">
                            <label for="yield_to_maturity">{{ trans('cruds.obligasi.fields.yield_to_maturity') }}</label>
                            <input class="form-control" type="number" name="yield_to_maturity" id="yield_to_maturity" value="{{ old('yield_to_maturity', $obligasi->yield_to_maturity) }}" step="0.01">
                            @if($errors->has('yield_to_maturity'))
                                <span class="help-block" role="alert">{{ $errors->first('yield_to_maturity') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.yield_to_maturity_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('faktor_pengurang') ? 'has-error' : '' }}">
                            <label for="faktor_pengurang">{{ trans('cruds.obligasi.fields.faktor_pengurang') }}</label>
                            <input class="form-control" type="number" name="faktor_pengurang" id="faktor_pengurang" value="{{ old('faktor_pengurang', $obligasi->faktor_pengurang) }}" step="0.01">
                            @if($errors->has('faktor_pengurang'))
                                <span class="help-block" role="alert">{{ $errors->first('faktor_pengurang') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.faktor_pengurang_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tenor') ? 'has-error' : '' }}">
                            <label for="tenor">{{ trans('cruds.obligasi.fields.tenor') }}</label>
                            <input class="form-control" type="number" name="tenor" id="tenor" value="{{ old('tenor', $obligasi->tenor) }}" step="0.01">
                            @if($errors->has('tenor'))
                                <span class="help-block" role="alert">{{ $errors->first('tenor') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.tenor_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('sisa_tenor') ? 'has-error' : '' }}">
                            <label for="sisa_tenor">{{ trans('cruds.obligasi.fields.sisa_tenor') }}</label>
                            <input class="form-control" type="number" name="sisa_tenor" id="sisa_tenor" value="{{ old('sisa_tenor', $obligasi->sisa_tenor) }}" step="0.01">
                            @if($errors->has('sisa_tenor'))
                                <span class="help-block" role="alert">{{ $errors->first('sisa_tenor') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.sisa_tenor_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('macaulay_duration') ? 'has-error' : '' }}">
                            <label for="macaulay_duration">{{ trans('cruds.obligasi.fields.macaulay_duration') }}</label>
                            <input class="form-control" type="number" name="macaulay_duration" id="macaulay_duration" value="{{ old('macaulay_duration', $obligasi->macaulay_duration) }}" step="0.01">
                            @if($errors->has('macaulay_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('macaulay_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.macaulay_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('modified_duration') ? 'has-error' : '' }}">
                            <label for="modified_duration">{{ trans('cruds.obligasi.fields.modified_duration') }}</label>
                            <input class="form-control" type="number" name="modified_duration" id="modified_duration" value="{{ old('modified_duration', $obligasi->modified_duration) }}" step="0.01">
                            @if($errors->has('modified_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('modified_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.modified_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('convexity_apporximation') ? 'has-error' : '' }}">
                            <label for="convexity_apporximation">{{ trans('cruds.obligasi.fields.convexity_apporximation') }}</label>
                            <input class="form-control" type="number" name="convexity_apporximation" id="convexity_apporximation" value="{{ old('convexity_apporximation', $obligasi->convexity_apporximation) }}" step="0.01">
                            @if($errors->has('convexity_apporximation'))
                                <span class="help-block" role="alert">{{ $errors->first('convexity_apporximation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.convexity_apporximation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bobot_macaulay_duration') ? 'has-error' : '' }}">
                            <label for="bobot_macaulay_duration">{{ trans('cruds.obligasi.fields.bobot_macaulay_duration') }}</label>
                            <input class="form-control" type="number" name="bobot_macaulay_duration" id="bobot_macaulay_duration" value="{{ old('bobot_macaulay_duration', $obligasi->bobot_macaulay_duration) }}" step="0.01">
                            @if($errors->has('bobot_macaulay_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('bobot_macaulay_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.bobot_macaulay_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bobot_modified_duration') ? 'has-error' : '' }}">
                            <label for="bobot_modified_duration">{{ trans('cruds.obligasi.fields.bobot_modified_duration') }}</label>
                            <input class="form-control" type="number" name="bobot_modified_duration" id="bobot_modified_duration" value="{{ old('bobot_modified_duration', $obligasi->bobot_modified_duration) }}" step="0.01">
                            @if($errors->has('bobot_modified_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('bobot_modified_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.bobot_modified_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bobot_convexity_apporximation') ? 'has-error' : '' }}">
                            <label for="bobot_convexity_apporximation">{{ trans('cruds.obligasi.fields.bobot_convexity_apporximation') }}</label>
                            <input class="form-control" type="number" name="bobot_convexity_apporximation" id="bobot_convexity_apporximation" value="{{ old('bobot_convexity_apporximation', $obligasi->bobot_convexity_apporximation) }}" step="0.01">
                            @if($errors->has('bobot_convexity_apporximation'))
                                <span class="help-block" role="alert">{{ $errors->first('bobot_convexity_apporximation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.bobot_convexity_apporximation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('last_edited_by') ? 'has-error' : '' }}">
                            <label for="last_edited_by">{{ trans('cruds.obligasi.fields.last_edited_by') }}</label>
                            <input class="form-control" type="text" name="last_edited_by" id="last_edited_by" value="{{ old('last_edited_by', $obligasi->last_edited_by) }}">
                            @if($errors->has('last_edited_by'))
                                <span class="help-block" role="alert">{{ $errors->first('last_edited_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.last_edited_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_updated') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_updated" value="0">
                                <input type="checkbox" name="is_updated" id="is_updated" value="1" {{ $obligasi->is_updated || old('is_updated', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_updated" style="font-weight: 400">{{ trans('cruds.obligasi.fields.is_updated') }}</label>
                            </div>
                            @if($errors->has('is_updated'))
                                <span class="help-block" role="alert">{{ $errors->first('is_updated') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.is_updated_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_new') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_new" value="0">
                                <input type="checkbox" name="is_new" id="is_new" value="1" {{ $obligasi->is_new || old('is_new', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_new" style="font-weight: 400">{{ trans('cruds.obligasi.fields.is_new') }}</label>
                            </div>
                            @if($errors->has('is_new'))
                                <span class="help-block" role="alert">{{ $errors->first('is_new') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.obligasi.fields.is_new_helper') }}</span>
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