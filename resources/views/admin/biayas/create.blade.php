@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.biaya.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.biayas.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
                            <label class="required" for="tanggal">{{ trans('cruds.biaya.fields.tanggal') }}</label>
                            <input class="form-control date" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required>
                            @if($errors->has('tanggal'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.biaya.fields.tanggal_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label class="required" for="name">{{ trans('cruds.biaya.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.biaya.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('source_file') ? 'has-error' : '' }}">
                            <label class="required" for="source_file">{{ trans('cruds.biaya.fields.source_file') }}</label>
                            <div class="needsclick dropzone" id="source_file-dropzone">
                            </div>
                            @if($errors->has('source_file'))
                                <span class="help-block" role="alert">{{ $errors->first('source_file') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.biaya.fields.source_file_helper') }}</span>
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
    url: '{{ route('admin.biayas.storeMedia') }}',
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
@if(isset($biaya) && $biaya->source_file)
      var file = {!! json_encode($biaya->source_file) !!}
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