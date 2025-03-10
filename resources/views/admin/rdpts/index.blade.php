@extends('layouts.admin')
@section('content')
<div class="content">
    @can('rdpt_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.rdpts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.rdpt.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'Rdpt', 'route' => 'admin.rdpts.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.rdpt.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-Rdpt">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.asset_migration') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.program') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.nilai_nominal') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.unit_penyertaan') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.nab') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.macaulay_duration') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.rdpt.fields.modified_duration') }}
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
                                            @foreach(App\Models\Rdpt::PROGRAM_SELECT as $key => $item)
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
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rdpts as $key => $rdpt)
                                    <tr data-entry-id="{{ $rdpt->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $rdpt->asset_migration->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\Rdpt::PROGRAM_SELECT[$rdpt->program] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rdpt->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rdpt->nilai_nominal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rdpt->unit_penyertaan ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rdpt->nab ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rdpt->macaulay_duration ?? '' }}
                                        </td>
                                        <td>
                                            {{ $rdpt->modified_duration ?? '' }}
                                        </td>
                                        <td>
                                            @can('rdpt_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.rdpts.show', $rdpt->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('rdpt_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.rdpts.edit', $rdpt->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('rdpt_delete')
                                                <form action="{{ route('admin.rdpts.destroy', $rdpt->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('rdpt_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.rdpts.massDestroy') }}",
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
  let table = $('.datatable-Rdpt:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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