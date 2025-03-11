@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.liabilityPortofolio.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.liability-portofolios.update", [$liabilityPortofolio->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('biaya') ? 'has-error' : '' }}">
                            <label class="required" for="biaya_id">{{ trans('cruds.liabilityPortofolio.fields.biaya') }}</label>
                            <select class="form-control select2" name="biaya_id" id="biaya_id" required>
                                @foreach($biayas as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('biaya_id') ? old('biaya_id') : $liabilityPortofolio->biaya->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('biaya'))
                                <span class="help-block" role="alert">{{ $errors->first('biaya') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.biaya_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('yield_curve') ? 'has-error' : '' }}">
                            <label for="yield_curve_id">{{ trans('cruds.liabilityPortofolio.fields.yield_curve') }}</label>
                            <select class="form-control select2" name="yield_curve_id" id="yield_curve_id">
                                @foreach($yield_curves as $id => $entry)
                                    <option value="{{ $id }}" {{ (old('yield_curve_id') ? old('yield_curve_id') : $liabilityPortofolio->yield_curve->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('yield_curve'))
                                <span class="help-block" role="alert">{{ $errors->first('yield_curve') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.yield_curve_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.liabilityPortofolio.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $liabilityPortofolio->name) }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.liabilityPortofolio.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description', $liabilityPortofolio->description) }}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('source_file') ? 'has-error' : '' }}">
                            <label class="required" for="source_file">{{ trans('cruds.liabilityPortofolio.fields.source_file') }}</label>
                            <div class="needsclick dropzone" id="source_file-dropzone">
                            </div>
                            @if($errors->has('source_file'))
                                <span class="help-block" role="alert">{{ $errors->first('source_file') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.source_file_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                            <label class="required" for="date">{{ trans('cruds.liabilityPortofolio.fields.date') }}</label>
                            <input class="form-control date" type="text" name="date" id="date" value="{{ old('date', $liabilityPortofolio->date) }}" required>
                            @if($errors->has('date'))
                                <span class="help-block" role="alert">{{ $errors->first('date') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.liabilityPortofolio.fields.date_helper') }}</span>
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
    Dropzone.options.sourceFileDropzone = {
    url: '{{ route('admin.liability-portofolios.storeMedia') }}',
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
      $('form').find('input[name="source_file"]').remove()
      $('form').append('<input type="hidden" name="source_file" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="source_file"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($liabilityPortofolio) && $liabilityPortofolio->source_file)
      var file = {!! json_encode($liabilityPortofolio->source_file) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="source_file" value="' + file.file_name + '">')
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