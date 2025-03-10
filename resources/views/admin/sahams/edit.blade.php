@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.saham.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.sahams.update", [$saham->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('asset_migration') ? 'has-error' : '' }}">
                            <label class="required" for="asset_migration_id">{{ trans('cruds.saham.fields.asset_migration') }}</label>
                            <select class="form-control select2" name="asset_migration_id" id="asset_migration_id" required>
                                @foreach($asset_migrations as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('asset_migration_id') ? old('asset_migration_id') : $saham->asset_migration->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('asset_migration'))
                                <span class="help-block" role="alert">{{ $errors->first('asset_migration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.asset_migration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('program') ? 'has-error' : '' }}">
                            <label class="required">{{ trans('cruds.saham.fields.program') }}</label>
                            <select class="form-control" name="program" id="program" required>
                                <option value disabled {{ old('program', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\Saham::PROGRAM_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('program', $saham->program) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('program'))
                                <span class="help-block" role="alert">{{ $errors->first('program') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.program_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level_1') ? 'has-error' : '' }}">
                            <label for="level_1">{{ trans('cruds.saham.fields.level_1') }}</label>
                            <input class="form-control" type="text" name="level_1" id="level_1" value="{{ old('level_1', $saham->level_1) }}">
                            @if($errors->has('level_1'))
                                <span class="help-block" role="alert">{{ $errors->first('level_1') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.level_1_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level_2') ? 'has-error' : '' }}">
                            <label for="level_2">{{ trans('cruds.saham.fields.level_2') }}</label>
                            <input class="form-control" type="text" name="level_2" id="level_2" value="{{ old('level_2', $saham->level_2) }}">
                            @if($errors->has('level_2'))
                                <span class="help-block" role="alert">{{ $errors->first('level_2') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.level_2_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level_3') ? 'has-error' : '' }}">
                            <label for="level_3">{{ trans('cruds.saham.fields.level_3') }}</label>
                            <input class="form-control" type="text" name="level_3" id="level_3" value="{{ old('level_3', $saham->level_3) }}">
                            @if($errors->has('level_3'))
                                <span class="help-block" role="alert">{{ $errors->first('level_3') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.level_3_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('ticker') ? 'has-error' : '' }}">
                            <label class="required" for="ticker">{{ trans('cruds.saham.fields.ticker') }}</label>
                            <input class="form-control" type="text" name="ticker" id="ticker" value="{{ old('ticker', $saham->ticker) }}" required>
                            @if($errors->has('ticker'))
                                <span class="help-block" role="alert">{{ $errors->first('ticker') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.ticker_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.saham.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $saham->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nilai_perolehan') ? 'has-error' : '' }}">
                            <label for="nilai_perolehan">{{ trans('cruds.saham.fields.nilai_perolehan') }}</label>
                            <input class="form-control" type="number" name="nilai_perolehan" id="nilai_perolehan" value="{{ old('nilai_perolehan', $saham->nilai_perolehan) }}" step="0.01">
                            @if($errors->has('nilai_perolehan'))
                                <span class="help-block" role="alert">{{ $errors->first('nilai_perolehan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.nilai_perolehan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('harga_perolehan') ? 'has-error' : '' }}">
                            <label for="harga_perolehan">{{ trans('cruds.saham.fields.harga_perolehan') }}</label>
                            <input class="form-control" type="number" name="harga_perolehan" id="harga_perolehan" value="{{ old('harga_perolehan', $saham->harga_perolehan) }}" step="0.01">
                            @if($errors->has('harga_perolehan'))
                                <span class="help-block" role="alert">{{ $errors->first('harga_perolehan') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.harga_perolehan_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('harga_pasar') ? 'has-error' : '' }}">
                            <label for="harga_pasar">{{ trans('cruds.saham.fields.harga_pasar') }}</label>
                            <input class="form-control" type="number" name="harga_pasar" id="harga_pasar" value="{{ old('harga_pasar', $saham->harga_pasar) }}" step="0.01">
                            @if($errors->has('harga_pasar'))
                                <span class="help-block" role="alert">{{ $errors->first('harga_pasar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.harga_pasar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('nilai_pasar') ? 'has-error' : '' }}">
                            <label for="nilai_pasar">{{ trans('cruds.saham.fields.nilai_pasar') }}</label>
                            <input class="form-control" type="number" name="nilai_pasar" id="nilai_pasar" value="{{ old('nilai_pasar', $saham->nilai_pasar) }}" step="0.01">
                            @if($errors->has('nilai_pasar'))
                                <span class="help-block" role="alert">{{ $errors->first('nilai_pasar') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.nilai_pasar_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('lembar_saham') ? 'has-error' : '' }}">
                            <label for="lembar_saham">{{ trans('cruds.saham.fields.lembar_saham') }}</label>
                            <input class="form-control" type="number" name="lembar_saham" id="lembar_saham" value="{{ old('lembar_saham', $saham->lembar_saham) }}" step="1">
                            @if($errors->has('lembar_saham'))
                                <span class="help-block" role="alert">{{ $errors->first('lembar_saham') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.lembar_saham_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('deviden_saham') ? 'has-error' : '' }}">
                            <label for="deviden_saham">{{ trans('cruds.saham.fields.deviden_saham') }}</label>
                            <input class="form-control" type="number" name="deviden_saham" id="deviden_saham" value="{{ old('deviden_saham', $saham->deviden_saham) }}" step="0.01">
                            @if($errors->has('deviden_saham'))
                                <span class="help-block" role="alert">{{ $errors->first('deviden_saham') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.deviden_saham_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('pembagian_deviden_saham') ? 'has-error' : '' }}">
                            <label for="pembagian_deviden_saham">{{ trans('cruds.saham.fields.pembagian_deviden_saham') }}</label>
                            <input class="form-control" type="number" name="pembagian_deviden_saham" id="pembagian_deviden_saham" value="{{ old('pembagian_deviden_saham', $saham->pembagian_deviden_saham) }}" step="1">
                            @if($errors->has('pembagian_deviden_saham'))
                                <span class="help-block" role="alert">{{ $errors->first('pembagian_deviden_saham') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.pembagian_deviden_saham_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('market_cap_saham') ? 'has-error' : '' }}">
                            <label for="market_cap_saham">{{ trans('cruds.saham.fields.market_cap_saham') }}</label>
                            <input class="form-control" type="number" name="market_cap_saham" id="market_cap_saham" value="{{ old('market_cap_saham', $saham->market_cap_saham) }}" step="0.01">
                            @if($errors->has('market_cap_saham'))
                                <span class="help-block" role="alert">{{ $errors->first('market_cap_saham') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.market_cap_saham_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('macaulay_duration') ? 'has-error' : '' }}">
                            <label for="macaulay_duration">{{ trans('cruds.saham.fields.macaulay_duration') }}</label>
                            <input class="form-control" type="number" name="macaulay_duration" id="macaulay_duration" value="{{ old('macaulay_duration', $saham->macaulay_duration) }}" step="0.01">
                            @if($errors->has('macaulay_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('macaulay_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.macaulay_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('modified_duration') ? 'has-error' : '' }}">
                            <label for="modified_duration">{{ trans('cruds.saham.fields.modified_duration') }}</label>
                            <input class="form-control" type="number" name="modified_duration" id="modified_duration" value="{{ old('modified_duration', $saham->modified_duration) }}" step="0.01">
                            @if($errors->has('modified_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('modified_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.modified_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('convexity_apporximation') ? 'has-error' : '' }}">
                            <label for="convexity_apporximation">{{ trans('cruds.saham.fields.convexity_apporximation') }}</label>
                            <input class="form-control" type="number" name="convexity_apporximation" id="convexity_apporximation" value="{{ old('convexity_apporximation', $saham->convexity_apporximation) }}" step="0.01">
                            @if($errors->has('convexity_apporximation'))
                                <span class="help-block" role="alert">{{ $errors->first('convexity_apporximation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.convexity_apporximation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bobot_macaulay_duration') ? 'has-error' : '' }}">
                            <label for="bobot_macaulay_duration">{{ trans('cruds.saham.fields.bobot_macaulay_duration') }}</label>
                            <input class="form-control" type="number" name="bobot_macaulay_duration" id="bobot_macaulay_duration" value="{{ old('bobot_macaulay_duration', $saham->bobot_macaulay_duration) }}" step="0.01">
                            @if($errors->has('bobot_macaulay_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('bobot_macaulay_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.bobot_macaulay_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bobot_modified_duration') ? 'has-error' : '' }}">
                            <label for="bobot_modified_duration">{{ trans('cruds.saham.fields.bobot_modified_duration') }}</label>
                            <input class="form-control" type="number" name="bobot_modified_duration" id="bobot_modified_duration" value="{{ old('bobot_modified_duration', $saham->bobot_modified_duration) }}" step="0.01">
                            @if($errors->has('bobot_modified_duration'))
                                <span class="help-block" role="alert">{{ $errors->first('bobot_modified_duration') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.bobot_modified_duration_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('bobot_convexity_apporximation') ? 'has-error' : '' }}">
                            <label for="bobot_convexity_apporximation">{{ trans('cruds.saham.fields.bobot_convexity_apporximation') }}</label>
                            <input class="form-control" type="number" name="bobot_convexity_apporximation" id="bobot_convexity_apporximation" value="{{ old('bobot_convexity_apporximation', $saham->bobot_convexity_apporximation) }}" step="0.01">
                            @if($errors->has('bobot_convexity_apporximation'))
                                <span class="help-block" role="alert">{{ $errors->first('bobot_convexity_apporximation') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.bobot_convexity_apporximation_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('last_edited_by') ? 'has-error' : '' }}">
                            <label for="last_edited_by">{{ trans('cruds.saham.fields.last_edited_by') }}</label>
                            <input class="form-control" type="text" name="last_edited_by" id="last_edited_by" value="{{ old('last_edited_by', $saham->last_edited_by) }}">
                            @if($errors->has('last_edited_by'))
                                <span class="help-block" role="alert">{{ $errors->first('last_edited_by') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.last_edited_by_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_updated') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_updated" value="0">
                                <input type="checkbox" name="is_updated" id="is_updated" value="1" {{ $saham->is_updated || old('is_updated', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_updated" style="font-weight: 400">{{ trans('cruds.saham.fields.is_updated') }}</label>
                            </div>
                            @if($errors->has('is_updated'))
                                <span class="help-block" role="alert">{{ $errors->first('is_updated') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.is_updated_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('is_new') ? 'has-error' : '' }}">
                            <div>
                                <input type="hidden" name="is_new" value="0">
                                <input type="checkbox" name="is_new" id="is_new" value="1" {{ $saham->is_new || old('is_new', 0) === 1 ? 'checked' : '' }}>
                                <label for="is_new" style="font-weight: 400">{{ trans('cruds.saham.fields.is_new') }}</label>
                            </div>
                            @if($errors->has('is_new'))
                                <span class="help-block" role="alert">{{ $errors->first('is_new') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.saham.fields.is_new_helper') }}</span>
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