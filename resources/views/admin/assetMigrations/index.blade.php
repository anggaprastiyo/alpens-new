@extends('layouts.admin')
@section('content')
<div class="content">
    @can('asset_migration_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.asset-migrations.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.assetMigration.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.assetMigration.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-AssetMigration">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.assetMigration.fields.yield_curve') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.assetMigration.fields.file_inv_langsung') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.assetMigration.fields.portofolio_date') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.assetMigration.fields.jumlah_tahun') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.assetMigration.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.assetMigration.fields.type') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.assetMigration.fields.version') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($assetMigrations as $key => $assetMigration)
                                    <tr data-entry-id="{{ $assetMigration->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $assetMigration->yield_curve->version_name ?? '' }}
                                        </td>
                                        <td>
                                            @if($assetMigration->file_inv_langsung)
                                                <a href="{{ $assetMigration->file_inv_langsung->getUrl() }}" target="_blank">
                                                    {{ trans('global.view_file') }}
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{ $assetMigration->portofolio_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $assetMigration->jumlah_tahun ?? '' }}
                                        </td>
                                        <td>
                                            {{ $assetMigration->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ App\Models\AssetMigration::TYPE_SELECT[$assetMigration->type] ?? '' }}
                                        </td>
                                        <td>
                                            {{ $assetMigration->version ?? '' }}
                                        </td>
                                        <td>
                                            @can('asset_migration_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.asset-migrations.show', $assetMigration->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('asset_migration_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.asset-migrations.edit', $assetMigration->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('asset_migration_delete')
                                                <form action="{{ route('admin.asset-migrations.destroy', $assetMigration->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('asset_migration_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.asset-migrations.massDestroy') }}",
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
  let table = $('.datatable-AssetMigration:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection