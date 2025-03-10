@extends('layouts.admin')
@section('content')
<div class="content">
    @can('data_sap_detail_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.data-sap-details.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.dataSapDetail.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'DataSapDetail', 'route' => 'admin.data-sap-details.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.dataSapDetail.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-DataSapDetail">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.dataSapDetail.fields.data_sap') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.dataSapDetail.fields.jenis_program') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.dataSapDetail.fields.item') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.dataSapDetail.fields.nominal') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($dataSapDetails as $key => $dataSapDetail)
                                    <tr data-entry-id="{{ $dataSapDetail->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $dataSapDetail->data_sap->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $dataSapDetail->jenis_program ?? '' }}
                                        </td>
                                        <td>
                                            {{ $dataSapDetail->item ?? '' }}
                                        </td>
                                        <td>
                                            {{ $dataSapDetail->nominal ?? '' }}
                                        </td>
                                        <td>
                                            @can('data_sap_detail_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.data-sap-details.show', $dataSapDetail->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('data_sap_detail_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.data-sap-details.edit', $dataSapDetail->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('data_sap_detail_delete')
                                                <form action="{{ route('admin.data-sap-details.destroy', $dataSapDetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('data_sap_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.data-sap-details.massDestroy') }}",
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
  let table = $('.datatable-DataSapDetail:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection