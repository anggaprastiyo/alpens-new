@extends('layouts.admin')
@section('content')
<div class="content">
    @can('yield_curve_detail_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.yield-curve-details.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.yieldCurveDetail.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'YieldCurveDetail', 'route' => 'admin.yield-curve-details.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.yieldCurveDetail.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-YieldCurveDetail">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.yieldCurveDetail.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.yieldCurveDetail.fields.yield_curve') }}
                                </th>
                                <th>
                                    {{ trans('cruds.yieldCurveDetail.fields.tanggal') }}
                                </th>
                                <th>
                                    {{ trans('cruds.yieldCurveDetail.fields.tenor_year') }}
                                </th>
                                <th>
                                    {{ trans('cruds.yieldCurveDetail.fields.today') }}
                                </th>
                                <th>
                                    {{ trans('cruds.yieldCurveDetail.fields.change_bps') }}
                                </th>
                                <th>
                                    {{ trans('cruds.yieldCurveDetail.fields.yesterday_yield') }}
                                </th>
                                <th>
                                    {{ trans('cruds.yieldCurveDetail.fields.lastweek_yield') }}
                                </th>
                                <th>
                                    {{ trans('cruds.yieldCurveDetail.fields.lastmonth_yield') }}
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
@can('yield_curve_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.yield-curve-details.massDestroy') }}",
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
    ajax: "{{ route('admin.yield-curve-details.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'yield_curve_version_name', name: 'yield_curve.version_name' },
{ data: 'tanggal', name: 'tanggal' },
{ data: 'tenor_year', name: 'tenor_year' },
{ data: 'today', name: 'today' },
{ data: 'change_bps', name: 'change_bps' },
{ data: 'yesterday_yield', name: 'yesterday_yield' },
{ data: 'lastweek_yield', name: 'lastweek_yield' },
{ data: 'lastmonth_yield', name: 'lastmonth_yield' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-YieldCurveDetail').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection