@extends('layouts.admin')
@section('content')
<div class="content">
    @can('price_historical_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.price-historicals.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.priceHistorical.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'PriceHistorical', 'route' => 'admin.price-historicals.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.priceHistorical.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-PriceHistorical">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.priceHistorical.fields.ticker') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.priceHistorical.fields.nama') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.priceHistorical.fields.tanggal') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.priceHistorical.fields.isin') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.priceHistorical.fields.rating') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.priceHistorical.fields.fair_yield') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.priceHistorical.fields.fair_price') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($priceHistoricals as $key => $priceHistorical)
                                    <tr data-entry-id="{{ $priceHistorical->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $priceHistorical->ticker ?? '' }}
                                        </td>
                                        <td>
                                            {{ $priceHistorical->nama ?? '' }}
                                        </td>
                                        <td>
                                            {{ $priceHistorical->tanggal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $priceHistorical->isin ?? '' }}
                                        </td>
                                        <td>
                                            {{ $priceHistorical->rating ?? '' }}
                                        </td>
                                        <td>
                                            {{ $priceHistorical->fair_yield ?? '' }}
                                        </td>
                                        <td>
                                            {{ $priceHistorical->fair_price ?? '' }}
                                        </td>
                                        <td>
                                            @can('price_historical_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.price-historicals.show', $priceHistorical->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('price_historical_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.price-historicals.edit', $priceHistorical->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('price_historical_delete')
                                                <form action="{{ route('admin.price-historicals.destroy', $priceHistorical->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('price_historical_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.price-historicals.massDestroy') }}",
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
  let table = $('.datatable-PriceHistorical:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection