@extends('layouts.admin')
@section('content')
<div class="content">
    @can('general_assumption_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.general-assumptions.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.generalAssumption.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'GeneralAssumption', 'route' => 'admin.general-assumptions.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.generalAssumption.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-GeneralAssumption">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.generalAssumption.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.generalAssumption.fields.version_name') }}
                                </th>
                                <th>
                                    {{ trans('cruds.generalAssumption.fields.tahun_awal_proyeksi') }}
                                </th>
                                <th>
                                    {{ trans('cruds.generalAssumption.fields.tahun_akhir_proyeksi') }}
                                </th>
                                <th>
                                    {{ trans('cruds.generalAssumption.fields.pajak_atas_kupon_obligasi') }}
                                </th>
                                <th>
                                    {{ trans('cruds.generalAssumption.fields.pajak_atas_bunga_deposito') }}
                                </th>
                                <th>
                                    {{ trans('cruds.generalAssumption.fields.kenaikan_bop_pertahun') }}
                                </th>
                                <th>
                                    {{ trans('cruds.generalAssumption.fields.market_cap_saham') }}
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
@can('general_assumption_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.general-assumptions.massDestroy') }}",
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
    ajax: "{{ route('admin.general-assumptions.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'version_name', name: 'version_name' },
{ data: 'tahun_awal_proyeksi', name: 'tahun_awal_proyeksi' },
{ data: 'tahun_akhir_proyeksi', name: 'tahun_akhir_proyeksi' },
{ data: 'pajak_atas_kupon_obligasi', name: 'pajak_atas_kupon_obligasi' },
{ data: 'pajak_atas_bunga_deposito', name: 'pajak_atas_bunga_deposito' },
{ data: 'kenaikan_bop_pertahun', name: 'kenaikan_bop_pertahun' },
{ data: 'market_cap_saham', name: 'market_cap_saham' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-GeneralAssumption').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection