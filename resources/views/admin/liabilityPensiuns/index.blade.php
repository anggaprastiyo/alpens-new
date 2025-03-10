@extends('layouts.admin')
@section('content')
<div class="content">
    @can('liability_pensiun_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.liability-pensiuns.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.liabilityPensiun.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'LiabilityPensiun', 'route' => 'admin.liability-pensiuns.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.liabilityPensiun.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-LiabilityPensiun">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.liabilityPensiun.fields.liability_portofolio') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityPensiun.fields.report_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityPensiun.fields.skenario') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityPensiun.fields.tahun') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityPensiun.fields.peserta_pensiun') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityPensiun.fields.iuran') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityPensiun.fields.spppip') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityPensiun.fields.pembayaran_manfaat') }}
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
@can('liability_pensiun_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.liability-pensiuns.massDestroy') }}",
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
    ajax: "{{ route('admin.liability-pensiuns.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'liability_portofolio_name', name: 'liability_portofolio.name' },
{ data: 'report_date', name: 'report_date' },
{ data: 'skenario', name: 'skenario' },
{ data: 'tahun', name: 'tahun' },
{ data: 'peserta_pensiun', name: 'peserta_pensiun' },
{ data: 'iuran', name: 'iuran' },
{ data: 'spppip', name: 'spppip' },
{ data: 'pembayaran_manfaat', name: 'pembayaran_manfaat' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-LiabilityPensiun').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection