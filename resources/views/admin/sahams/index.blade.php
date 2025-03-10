@extends('layouts.admin')
@section('content')
<div class="content">
    @can('saham_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.sahams.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.saham.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Saham', 'route' => 'admin.sahams.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.saham.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Saham">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.saham.fields.asset_migration') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.saham.fields.program') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.saham.fields.ticker') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.saham.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.saham.fields.harga_pasar') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.saham.fields.nilai_pasar') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.saham.fields.lembar_saham') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.saham.fields.macaulay_duration') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.saham.fields.modified_duration') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                                <tr>
                                    <td>
                                    </td>
                                    <td>
                                        <select class="search">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach($asset_migrations as $key => $item)
                                                <option value="{{ $item->name }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <select class="search" strict="true">
                                            <option value>{{ trans('global.all') }}</option>
                                            @foreach(App\Models\Saham::PROGRAM_SELECT as $key => $item)
                                                <option value="{{ $item }}">{{ $item }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                        <input class="search" type="text" placeholder="{{ trans('global.search') }}">
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($sahams as $key => $saham)
                                    <tr data-entry-id="{{ $saham->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $saham->asset_migration->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Saham::PROGRAM_SELECT[$saham->program] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $saham->ticker ?? '' }}
                                        </td>
                                        <td>
                                            {{ $saham->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $saham->harga_pasar ?? '' }}
                                        </td>
                                        <td>
                                            {{ $saham->nilai_pasar ?? '' }}
                                        </td>
                                        <td>
                                            {{ $saham->lembar_saham ?? '' }}
                                        </td>
                                        <td>
                                            {{ $saham->macaulay_duration ?? '' }}
                                        </td>
                                        <td>
                                            {{ $saham->modified_duration ?? '' }}
                                        </td>
                                        <td>
                                            @can('saham_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.sahams.show', $saham->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('saham_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.sahams.edit', $saham->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('saham_delete')
                                                <form action="{{ route('admin.sahams.destroy', $saham->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('saham_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.sahams.massDestroy') }}",
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
  let table = $('.datatable-Saham:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
let visibleColumnsIndexes = null;
$('.datatable thead').on('input', '.search', function () {
      let strict = $(this).attr('strict') || false
      let value = strict && this.value ? "^" + this.value + "$" : this.value

      let index = $(this).parent().index()
      if (visibleColumnsIndexes !== null) {
        index = visibleColumnsIndexes[index]
      }

      table
        .column(index)
        .search(value, strict)
        .draw()
  });
table.on('column-visibility.dt', function(e, settings, column, state) {
      visibleColumnsIndexes = []
      table.columns(":visible").every(function(colIdx) {
          visibleColumnsIndexes.push(colIdx);
      });
  })
})

</script>
@endsection