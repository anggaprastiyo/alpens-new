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
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AssetAdjustment">
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
                            <tbody>
                                @foreach($assetAdjustments as $key => $assetAdjustment)
                                    <tr data-entry-id="{{ $assetAdjustment->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $assetAdjustment->portfolio_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $assetAdjustment->tipe_asset ?? '' }}
                                        </td>
                                        <td>
                                            {{ $assetAdjustment->program ?? '' }}
                                        </td>
                                        <td>
                                            {{ $assetAdjustment->level_1 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $assetAdjustment->level_2 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $assetAdjustment->level_3 ?? '' }}
                                        </td>
                                        <td>
                                            {{ $assetAdjustment->ticker ?? '' }}
                                        </td>
                                        <td>
                                            {{ $assetAdjustment->name ?? '' }}
                                        </td>
                                        <td>
                                            @can('asset_adjustment_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.asset-adjustments.show', $assetAdjustment->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('asset_adjustment_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.asset-adjustments.edit', $assetAdjustment->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('asset_adjustment_delete')
                                                <form action="{{ route('admin.asset-adjustments.destroy', $assetAdjustment->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('asset_adjustment_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.asset-adjustments.massDestroy') }}",
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
  let table = $('.datatable-AssetAdjustment:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection