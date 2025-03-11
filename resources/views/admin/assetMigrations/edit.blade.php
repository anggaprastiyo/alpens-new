@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.assetMigration.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.asset-migrations.update", [$assetMigration->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('yield_curve') ? 'has-error' : '' }}">
                            <label class="required" for="yield_curve_id">{{ trans('cruds.assetMigration.fields.yield_curve') }}</label>
                            <select class="form-control select2" name="yield_curve_id" id="yield_curve_id" required>
                                @foreach($yield_curves as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('yield_curve_id') ? old('yield_curve_id') : $assetMigration->yield_curve->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('yield_curve'))
                                <span class="help-block" role="alert">{{ $errors->first('yield_curve') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetMigration.fields.yield_curve_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('file_inv_langsung') ? 'has-error' : '' }}">
                            <label for="file_inv_langsung">{{ trans('cruds.assetMigration.fields.file_inv_langsung') }}</label>
                            <div class="needsclick dropzone" id="file_inv_langsung-dropzone">
                            </div>
                            @if($errors->has('file_inv_langsung'))
                                <span class="help-block" role="alert">{{ $errors->first('file_inv_langsung') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetMigration.fields.file_inv_langsung_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('portofolio_date') ? 'has-error' : '' }}">
                            <label class="required" for="portofolio_date">{{ trans('cruds.assetMigration.fields.portofolio_date') }}</label>
                            <input class="form-control date" type="text" name="portofolio_date" id="portofolio_date" value="{{ old('portofolio_date', $assetMigration->portofolio_date) }}" required>
                            @if($errors->has('portofolio_date'))
                                <span class="help-block" role="alert">{{ $errors->first('portofolio_date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetMigration.fields.portofolio_date_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('jumlah_tahun') ? 'has-error' : '' }}">
                            <label class="required" for="jumlah_tahun">{{ trans('cruds.assetMigration.fields.jumlah_tahun') }}</label>
                            <input class="form-control" type="number" name="jumlah_tahun" id="jumlah_tahun" value="{{ old('jumlah_tahun', $assetMigration->jumlah_tahun) }}" step="1" required>
                            @if($errors->has('jumlah_tahun'))
                                <span class="help-block" role="alert">{{ $errors->first('jumlah_tahun') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetMigration.fields.jumlah_tahun_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.assetMigration.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $assetMigration->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetMigration.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('type') ? 'has-error' : '' }}">
                            <label>{{ trans('cruds.assetMigration.fields.type') }}</label>
                            <select class="form-control" name="type" id="type">
                                <option value disabled {{ old('type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Models\AssetMigration::TYPE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type', $assetMigration->type) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type'))
                                <span class="help-block" role="alert">{{ $errors->first('type') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetMigration.fields.type_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('version') ? 'has-error' : '' }}">
                            <label class="required" for="version">{{ trans('cruds.assetMigration.fields.version') }}</label>
                            <input class="form-control" type="text" name="version" id="version" value="{{ old('version', $assetMigration->version) }}" required>
                            @if($errors->has('version'))
                                <span class="help-block" role="alert">{{ $errors->first('version') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.assetMigration.fields.version_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.fileInvLangsungDropzone = {
    url: '{{ route('admin.asset-migrations.storeMedia') }}',
    maxFilesize: 10, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').find('input[name="file_inv_langsung"]').remove()
      $('form').append('<input type="hidden" name="file_inv_langsung" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="file_inv_langsung"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($assetMigration) && $assetMigration->file_inv_langsung)
      var file = {!! json_encode($assetMigration->file_inv_langsung) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="file_inv_langsung" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection