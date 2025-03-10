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
                        <div class="form-group {{ $errors->has('nama') ? 'has-error' : '' }}">
                            <label class="required" for="nama">{{ trans('cruds.biaya.fields.nama') }}</label>
                            <input class="form-control" type="text" name="nama" id="nama" value="{{ old('nama', '') }}" required>
                            @if($errors->has('nama'))
                                <span class="help-block" role="alert">{{ $errors->first('nama') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.biaya.fields.nama_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('tanggal') ? 'has-error' : '' }}">
                            <label class="required" for="tanggal">{{ trans('cruds.biaya.fields.tanggal') }}</label>
                            <input class="form-control date" type="text" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" required>
                            @if($errors->has('tanggal'))
                                <span class="help-block" role="alert">{{ $errors->first('tanggal') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.biaya.fields.tanggal_helper') }}</span>
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