@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.reksadana.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.reksadanas.update", [$reksadana->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('asset_migration') ? 'has-error' : '' }}">
                            <label class="required" for="asset_migration_id">{{ trans('cruds.reksadana.fields.asset_migration') }}</label>
                            <select class="form-control select2" name="asset_migration_id" id="asset_migration_id" required>
                                @foreach($asset_migrations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('asset_migration_id') ? old('asset_migration_id') : $reksadana->asset_migration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('asset_migration'))
                                <span class="help-block" role="alert">{{ $errors->first('asset_migration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.asset_migration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tipe_asset') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.reksadana.fields.tipe_asset') }}</label>
                            <select class="form-control" name="tipe_asset" id="tipe_asset" required>
                                <option value disabled {{ old('tipe_asset', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Reksadana::TIPE_ASSET_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('tipe_asset', $reksadana->tipe_asset) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('tipe_asset'))
                                <span class="help-block" role="alert">{{ $errors->first('tipe_asset') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.tipe_asset_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('program') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.reksadana.fields.program') }}</label>
                            <select class="form-control" name="program" id="program" required>
                                <option value disabled {{ old('program', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Reksadana::PROGRAM_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('program', $reksadana->program) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('program'))
                                <span class="help-block" role="alert">{{ $errors->first('program') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.program_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level_1') ? 'has-error' : '' }}">
                            <label for="level_1">{{ trans('cruds.reksadana.fields.level_1') }}</label>
                            <input class="form-control" type="text" name="level_1" id="level_1" value="{{ old('level_1', $reksadana->level_1) }}">
                            @if($errors->has('level_1'))
                                <span class="help-block" role="alert">{{ $errors->first('level_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.level_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level_2') ? 'has-error' : '' }}">
                            <label for="level_2">{{ trans('cruds.reksadana.fields.level_2') }}</label>
                            <input class="form-control" type="text" name="level_2" id="level_2" value="{{ old('level_2', $reksadana->level_2) }}">
                            @if($errors->has('level_2'))
                                <span class="help-block" role="alert">{{ $errors->first('level_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.level_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level_3') ? 'has-error' : '' }}">
                            <label for="level_3">{{ trans('cruds.reksadana.fields.level_3') }}</label>
                            <input class="form-control" type="text" name="level_3" id="level_3" value="{{ old('level_3', $reksadana->level_3) }}">
                            @if($errors->has('level_3'))
                                <span class="help-block" role="alert">{{ $errors->first('level_3') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.level_3_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ticker') ? 'has-error' : '' }}">
                            <label class="required" for="ticker">{{ trans('cruds.reksadana.fields.ticker') }}</label>
                            <input class="form-control" type="text" name="ticker" id="ticker" value="{{ old('ticker', $reksadana->ticker) }}" required>
                            @if($errors->has('ticker'))
                                <span class="help-block" role="alert">{{ $errors->first('ticker') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.ticker_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.reksadana.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $reksadana->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nama_mi') ? 'has-error' : '' }}">
                            <label for="nama_mi">{{ trans('cruds.reksadana.fields.nama_mi') }}</label>
                            <input class="form-control" type="text" name="nama_mi" id="nama_mi" value="{{ old('nama_mi', $reksadana->nama_mi) }}">
                            @if($errors->has('nama_mi'))
                                <span class="help-block" role="alert">{{ $errors->first('nama_mi') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.nama_mi_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal_perolehan') ? 'has-error' : '' }}">
                            <label for="tanggal_perolehan">{{ trans('cruds.reksadana.fields.tanggal_perolehan') }}</label>
                            <input class="form-control date" type="text" name="tanggal_perolehan" id="tanggal_perolehan" value="{{ old('tanggal_perolehan', $reksadana->tanggal_perolehan) }}">
                            @if($errors->has('tanggal_perolehan'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal_perolehan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.tanggal_perolehan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nilai_nominal') ? 'has-error' : '' }}">
                            <label for="nilai_nominal">{{ trans('cruds.reksadana.fields.nilai_nominal') }}</label>
                            <input class="form-control" type="number" name="nilai_nominal" id="nilai_nominal" value="{{ old('nilai_nominal', $reksadana->nilai_nominal) }}" step="0.01">
                            @if($errors->has('nilai_nominal'))
                                <span class="help-block" role="alert">{{ $errors->first('nilai_nominal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.nilai_nominal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nilai_perolehan') ? 'has-error' : '' }}">
                            <label for="nilai_perolehan">{{ trans('cruds.reksadana.fields.nilai_perolehan') }}</label>
                            <input class="form-control" type="number" name="nilai_perolehan" id="nilai_perolehan" value="{{ old('nilai_perolehan', $reksadana->nilai_perolehan) }}" step="0.01">
                            @if($errors->has('nilai_perolehan'))
                                <span class="help-block" role="alert">{{ $errors->first('nilai_perolehan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.nilai_perolehan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('harga_perolehan') ? 'has-error' : '' }}">
                            <label for="harga_perolehan">{{ trans('cruds.reksadana.fields.harga_perolehan') }}</label>
                            <input class="form-control" type="number" name="harga_perolehan" id="harga_perolehan" value="{{ old('harga_perolehan', $reksadana->harga_perolehan) }}" step="0.01">
                            @if($errors->has('harga_perolehan'))
                                <span class="help-block" role="alert">{{ $errors->first('harga_perolehan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.harga_perolehan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nilai_pasar') ? 'has-error' : '' }}">
                            <label for="nilai_pasar">{{ trans('cruds.reksadana.fields.nilai_pasar') }}</label>
                            <input class="form-control" type="number" name="nilai_pasar" id="nilai_pasar" value="{{ old('nilai_pasar', $reksadana->nilai_pasar) }}" step="0.01">
                            @if($errors->has('nilai_pasar'))
                                <span class="help-block" role="alert">{{ $errors->first('nilai_pasar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.nilai_pasar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('type_reksadana') ? 'has-error' : '' }}">
                            <label for="type_reksadana">{{ trans('cruds.reksadana.fields.type_reksadana') }}</label>
                            <input class="form-control" type="text" name="type_reksadana" id="type_reksadana" value="{{ old('type_reksadana', $reksadana->type_reksadana) }}">
                            @if($errors->has('type_reksadana'))
                                <span class="help-block" role="alert">{{ $errors->first('type_reksadana') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.type_reksadana_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('unit_penyertaan') ? 'has-error' : '' }}">
                            <label for="unit_penyertaan">{{ trans('cruds.reksadana.fields.unit_penyertaan') }}</label>
                            <input class="form-control" type="number" name="unit_penyertaan" id="unit_penyertaan" value="{{ old('unit_penyertaan', $reksadana->unit_penyertaan) }}" step="0.01">
                            @if($errors->has('unit_penyertaan'))
                                <span class="help-block" role="alert">{{ $errors->first('unit_penyertaan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.unit_penyertaan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nab') ? 'has-error' : '' }}">
                            <label for="nab">{{ trans('cruds.reksadana.fields.nab') }}</label>
                            <input class="form-control" type="number" name="nab" id="nab" value="{{ old('nab', $reksadana->nab) }}" step="0.01">
                            @if($errors->has('nab'))
                                <span class="help-block" role="alert">{{ $errors->first('nab') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.nab_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('macaulay_duration') ? 'has-error' : '' }}">
                            <label for="macaulay_duration">{{ trans('cruds.reksadana.fields.macaulay_duration') }}</label>
                            <input class="form-control" type="number" name="macaulay_duration" id="macaulay_duration" value="{{ old('macaulay_duration', $reksadana->macaulay_duration) }}" step="0.01">
                            @if($errors->has('macaulay_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('macaulay_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.macaulay_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('modified_duration') ? 'has-error' : '' }}">
                            <label for="modified_duration">{{ trans('cruds.reksadana.fields.modified_duration') }}</label>
                            <input class="form-control" type="number" name="modified_duration" id="modified_duration" value="{{ old('modified_duration', $reksadana->modified_duration) }}" step="0.01">
                            @if($errors->has('modified_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('modified_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.modified_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('convexity_apporximation') ? 'has-error' : '' }}">
                            <label for="convexity_apporximation">{{ trans('cruds.reksadana.fields.convexity_apporximation') }}</label>
                            <input class="form-control" type="number" name="convexity_apporximation" id="convexity_apporximation" value="{{ old('convexity_apporximation', $reksadana->convexity_apporximation) }}" step="0.01">
                            @if($errors->has('convexity_apporximation'))
                                <span class="help-block" role="alert">{{ $errors->first('convexity_apporximation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.convexity_apporximation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bobot_macaulay_duration') ? 'has-error' : '' }}">
                            <label for="bobot_macaulay_duration">{{ trans('cruds.reksadana.fields.bobot_macaulay_duration') }}</label>
                            <input class="form-control" type="number" name="bobot_macaulay_duration" id="bobot_macaulay_duration" value="{{ old('bobot_macaulay_duration', $reksadana->bobot_macaulay_duration) }}" step="0.01">
                            @if($errors->has('bobot_macaulay_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('bobot_macaulay_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.bobot_macaulay_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bobot_modified_duration') ? 'has-error' : '' }}">
                            <label for="bobot_modified_duration">{{ trans('cruds.reksadana.fields.bobot_modified_duration') }}</label>
                            <input class="form-control" type="number" name="bobot_modified_duration" id="bobot_modified_duration" value="{{ old('bobot_modified_duration', $reksadana->bobot_modified_duration) }}" step="0.01">
                            @if($errors->has('bobot_modified_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('bobot_modified_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.bobot_modified_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bobot_convexity_apporximation') ? 'has-error' : '' }}">
                            <label for="bobot_convexity_apporximation">{{ trans('cruds.reksadana.fields.bobot_convexity_apporximation') }}</label>
                            <input class="form-control" type="number" name="bobot_convexity_apporximation" id="bobot_convexity_apporximation" value="{{ old('bobot_convexity_apporximation', $reksadana->bobot_convexity_apporximation) }}" step="0.01">
                            @if($errors->has('bobot_convexity_apporximation'))
                                <span class="help-block" role="alert">{{ $errors->first('bobot_convexity_apporximation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.bobot_convexity_apporximation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('last_edited_by') ? 'has-error' : '' }}">
                            <label for="last_edited_by">{{ trans('cruds.reksadana.fields.last_edited_by') }}</label>
                            <input class="form-control" type="text" name="last_edited_by" id="last_edited_by" value="{{ old('last_edited_by', $reksadana->last_edited_by) }}">
                            @if($errors->has('last_edited_by'))
                                <span class="help-block" role="alert">{{ $errors->first('last_edited_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.last_edited_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_updated') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_updated" value="0">
                                <input type="checkbox" name="is_updated" id="is_updated" value="1" {{ $reksadana->is_updated || old('is_updated', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_updated" style="font-weight: 400">{{ trans('cruds.reksadana.fields.is_updated') }}</label>
                            </div>
                            @if($errors->has('is_updated'))
                                <span class="help-block" role="alert">{{ $errors->first('is_updated') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.is_updated_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_new') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_new" value="0">
                                <input type="checkbox" name="is_new" id="is_new" value="1" {{ $reksadana->is_new || old('is_new', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_new" style="font-weight: 400">{{ trans('cruds.reksadana.fields.is_new') }}</label>
                            </div>
                            @if($errors->has('is_new'))
                                <span class="help-block" role="alert">{{ $errors->first('is_new') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.reksadana.fields.is_new_helper') }}</span>
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