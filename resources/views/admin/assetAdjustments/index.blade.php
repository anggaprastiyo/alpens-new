@extends('layouts.admin')
@section('content')
<div class="content">
    @can('asset_adjustment_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.asset-adjustments.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.assetAdjustment.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'AssetAdjustment', 'route' => 'admin.asset-adjustments.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.assetAdjustment.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-AssetAdjustment">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.assetAdjustment.fields.portfolio_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.assetAdjustment.fields.tipe_asset') }}
                                </th>
                                <th>
                                    {{ trans('cruds.assetAdjustment.fields.program') }}
                                </th>
                                <th>
                                    {{ trans('cruds.assetAdjustment.fields.level_1') }}
                                </th>
                                <th>
                                    {{ trans('cruds.assetAdjustment.fields.level_2') }}
                                </th>
                                <th>
                                    {{ trans('cruds.assetAdjustment.fields.level_3') }}
                                </th>
                                <th>
                                    {{ trans('cruds.assetAdjustment.fields.ticker') }}
                                </th>
                                <th>
                                    {{ trans('cruds.assetAdjustment.fields.name') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                    </table>
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
@can('asset_adjustment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.asset-adjustments.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).data(), function (entry) {
          return entry.id
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

  let dtOverrideGlobals = {
    buttons: dtButtons,
    processing: true,
    serverSide: true,
    retrieve: true,
    aaSorting: [],
    ajax: "{{ route('admin.asset-adjustments.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'portfolio_date', name: 'portfolio_date' },
{ data: 'tipe_asset', name: 'tipe_asset' },
{ data: 'program', name: 'program' },
{ data: 'level_1', name: 'level_1' },
{ data: 'level_2', name: 'level_2' },
{ data: 'level_3', name: 'level_3' },
{ data: 'ticker', name: 'ticker' },
{ data: 'name', name: 'name' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-AssetAdjustment').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection