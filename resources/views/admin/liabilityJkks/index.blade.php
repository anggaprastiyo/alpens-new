@extends('layouts.admin')
@section('content')
<div class="content">
    @can('liability_jkk_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.liability-jkks.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.liabilityJkk.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'LiabilityJkk', 'route' => 'admin.liability-jkks.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.liabilityJkk.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-LiabilityJkk">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.liabilityJkk.fields.liability_portofolio') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityJkk.fields.skenario') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityJkk.fields.tahun') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityJkk.fields.kps_jumlah_peserta_baru') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityJkk.fields.kps_jumlah_peserta_aktif') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityJkk.fields.iuran') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityJkk.fields.jumlah_kejadian') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityJkk.fields.pembayaran_manfaat') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityJkk.fields.cadangan_teknis') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityJkk.fields.cadangan_teknis_ibnr') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityJkk.fields.kenaikan_cadangan_teknis_ekdp') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityJkk.fields.kenaikan_cadangan_teknis_ibnr') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityJkk.fields.rasio_klaim') }}
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
@can('liability_jkk_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.liability-jkks.massDestroy') }}",
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
    ajax: "{{ route('admin.liability-jkks.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'liability_portofolio_name', name: 'liability_portofolio.name' },
{ data: 'skenario', name: 'skenario' },
{ data: 'tahun', name: 'tahun' },
{ data: 'kps_jumlah_peserta_baru', name: 'kps_jumlah_peserta_baru' },
{ data: 'kps_jumlah_peserta_aktif', name: 'kps_jumlah_peserta_aktif' },
{ data: 'iuran', name: 'iuran' },
{ data: 'jumlah_kejadian', name: 'jumlah_kejadian' },
{ data: 'pembayaran_manfaat', name: 'pembayaran_manfaat' },
{ data: 'cadangan_teknis', name: 'cadangan_teknis' },
{ data: 'cadangan_teknis_ibnr', name: 'cadangan_teknis_ibnr' },
{ data: 'kenaikan_cadangan_teknis_ekdp', name: 'kenaikan_cadangan_teknis_ekdp' },
{ data: 'kenaikan_cadangan_teknis_ibnr', name: 'kenaikan_cadangan_teknis_ibnr' },
{ data: 'rasio_klaim', name: 'rasio_klaim' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-LiabilityJkk').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection