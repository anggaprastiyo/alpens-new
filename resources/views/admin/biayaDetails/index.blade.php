@extends('layouts.admin')
@section('content')
<div class="content">
    @can('biaya_detail_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.biaya-details.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.biayaDetail.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'BiayaDetail', 'route' => 'admin.biaya-details.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.biayaDetail.title_singular') }} {{ trans('global.list') }} | <b>{{ $biaya->nama }} - ID = {{ $biaya->id }}</b>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-BiayaDetail">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.biayaDetail.fields.program') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.biayaDetail.fields.iuran') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.biayaDetail.fields.bop') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.biayaDetail.fields.biaya_operasional') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.biayaDetail.fields.rkap_iuran') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.biayaDetail.fields.rkap_bop') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.biayaDetail.fields.rkap_biaya_operasional') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($biayaDetails as $key => $biayaDetail)
                                    <tr data-entry-id="{{ $biayaDetail->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ App\Models\BiayaDetail::PROGRAM_SELECT[$biayaDetail->program] ?? '' }}
                                        </td>
                                        <td>
                                            {{ number_format($biayaDetail->iuran) ?? '' }}
                                        </td>
                                        <td>
                                            {{ number_format($biayaDetail->bop) ?? '' }}
                                        </td>
                                        <td>
                                            {{ number_format($biayaDetail->biaya_operasional) ?? '' }}
                                        </td>
                                        <td>
                                            {{ number_format($biayaDetail->rkap_iuran) ?? '' }}
                                        </td>
                                        <td>
                                            {{ number_format($biayaDetail->rkap_bop) ?? '' }}
                                        </td>
                                        <td>
                                            {{ number_format($biayaDetail->rkap_biaya_operasional) ?? '' }}
                                        </td>
                                        <td>
                                            @can('biaya_detail_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.biaya-details.show', $biayaDetail->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('biaya_detail_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.biaya-details.edit', $biayaDetail->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('biaya_detail_delete')
                                                <form action="{{ route('admin.biaya-details.destroy', $biayaDetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                                </form>
                                            @endcan

                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('biaya_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.biaya-details.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-BiayaDetail:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})
</script>
@endsection