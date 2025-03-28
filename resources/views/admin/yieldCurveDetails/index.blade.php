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
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-YieldCurveDetail">
                            <thead>
                                <tr>
                                    <th width="10">

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
                            <tbody>
                                @foreach($yieldCurveDetails as $key => $yieldCurveDetail)
                                    <tr data-entry-id="{{ $yieldCurveDetail->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $yieldCurveDetail->yield_curve->version_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $yieldCurveDetail->tanggal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $yieldCurveDetail->tenor_year ?? '' }}
                                        </td>
                                        <td>
                                            {{ $yieldCurveDetail->today ?? '' }}
                                        </td>
                                        <td>
                                            {{ $yieldCurveDetail->change_bps ?? '' }}
                                        </td>
                                        <td>
                                            {{ $yieldCurveDetail->yesterday_yield ?? '' }}
                                        </td>
                                        <td>
                                            {{ $yieldCurveDetail->lastweek_yield ?? '' }}
                                        </td>
                                        <td>
                                            {{ $yieldCurveDetail->lastmonth_yield ?? '' }}
                                        </td>
                                        <td>
                                            @can('yield_curve_detail_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.yield-curve-details.show', $yieldCurveDetail->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('yield_curve_detail_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.yield-curve-details.edit', $yieldCurveDetail->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('yield_curve_detail_delete')
                                                <form action="{{ route('admin.yield-curve-details.destroy', $yieldCurveDetail->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('yield_curve_detail_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.yield-curve-details.massDestroy') }}",
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
  let table = $('.datatable-YieldCurveDetail:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection