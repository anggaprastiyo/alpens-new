@extends('layouts.admin')
@section('content')
<div class="content">
    @can('investasi_langsung_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.investasi-langsungs.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.investasiLangsung.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'InvestasiLangsung', 'route' => 'admin.investasi-langsungs.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.investasiLangsung.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-InvestasiLangsung">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.asset_migration') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.program') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.nilai_pasar') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.nilai_investasi') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.modified_duration') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.investasiLangsung.fields.macaulay_duration') }}
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
                                            @foreach(App\Models\InvestasiLangsung::PROGRAM_SELECT as $key => $item)
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
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($investasiLangsungs as $key => $investasiLangsung)
                                    <tr data-entry-id="{{ $investasiLangsung->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $investasiLangsung->asset_migration->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\InvestasiLangsung::PROGRAM_SELECT[$investasiLangsung->program] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $investasiLangsung->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $investasiLangsung->nilai_pasar ?? '' }}
                                        </td>
                                        <td>
                                            {{ $investasiLangsung->nilai_investasi ?? '' }}
                                        </td>
                                        <td>
                                            {{ $investasiLangsung->modified_duration ?? '' }}
                                        </td>
                                        <td>
                                            {{ $investasiLangsung->macaulay_duration ?? '' }}
                                        </td>
                                        <td>
                                            @can('investasi_langsung_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.investasi-langsungs.show', $investasiLangsung->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('investasi_langsung_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.investasi-langsungs.edit', $investasiLangsung->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('investasi_langsung_delete')
                                                <form action="{{ route('admin.investasi-langsungs.destroy', $investasiLangsung->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('investasi_langsung_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.investasi-langsungs.massDestroy') }}",
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
  let table = $('.datatable-InvestasiLangsung:not(.ajaxTable)').DataTable({ buttons: dtButtons })
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