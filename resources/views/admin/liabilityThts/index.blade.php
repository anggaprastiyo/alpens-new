@extends('layouts.admin')
@section('content')
<div class="content">
    @can('liability_tht_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.liability-thts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.liabilityTht.title_singular') }}
                </a>
                <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                    {{ trans('global.app_csvImport') }}
                </button>
                @include('csvImport.modal', ['model' => 'LiabilityTht', 'route' => 'admin.liability-thts.parseCsvImport'])
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.liabilityTht.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-LiabilityTht">
                        <thead>
                            <tr>
                                <th width="10">

                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.liability_portofolio') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.report_date') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.skenario') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.tahun') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.kps_jumlah_pns_baru') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.kps_jumlah_peserta_aktif') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.pensiun_iuran') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.pensiun_manfaat') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.tht_iuran_tht') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.tht_iuran_si') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_klaim_pensiun') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_klaim_meninggal') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_klaim_keluar') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_pembayaran_pensiun') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_pembayaran_meninggal') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.dwiguna_jumlah_pembayaran_keluar') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.dwiguna_si_hp_pensiun') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.dwiguna_si_hp_meninggal') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.dwiguna_si_hp_keluar') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_klaim_pensiun') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_klaim_meninggal') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_klaim_keluar') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_pembayaran_pensiun') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_pembayaran_meninggal') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.askem_aktif_jumlah_pembayaran_keluar') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_klaim_pensiun') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_klaim_meninggal') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_klaim_keluar') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_pembayaran_pensiun') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_pembayaran_meninggal') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.askem_pensiun_jumlah_pembayaran_keluar') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.total_manfaat') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.kmpmd_asuransi_dwiguna') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.kmpmd_asuransi_kematian') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.kenaikan_kmpmd') }}
                                </th>
                                <th>
                                    {{ trans('cruds.liabilityTht.fields.liabilitas') }}
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
@can('liability_tht_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}';
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.liability-thts.massDestroy') }}",
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
    ajax: "{{ route('admin.liability-thts.index') }}",
    columns: [
      { data: 'placeholder', name: 'placeholder' },
{ data: 'id', name: 'id' },
{ data: 'liability_portofolio_name', name: 'liability_portofolio.name' },
{ data: 'report_date', name: 'report_date' },
{ data: 'skenario', name: 'skenario' },
{ data: 'tahun', name: 'tahun' },
{ data: 'kps_jumlah_pns_baru', name: 'kps_jumlah_pns_baru' },
{ data: 'kps_jumlah_peserta_aktif', name: 'kps_jumlah_peserta_aktif' },
{ data: 'pensiun_iuran', name: 'pensiun_iuran' },
{ data: 'pensiun_manfaat', name: 'pensiun_manfaat' },
{ data: 'tht_iuran_tht', name: 'tht_iuran_tht' },
{ data: 'tht_iuran_si', name: 'tht_iuran_si' },
{ data: 'dwiguna_jumlah_klaim_pensiun', name: 'dwiguna_jumlah_klaim_pensiun' },
{ data: 'dwiguna_jumlah_klaim_meninggal', name: 'dwiguna_jumlah_klaim_meninggal' },
{ data: 'dwiguna_jumlah_klaim_keluar', name: 'dwiguna_jumlah_klaim_keluar' },
{ data: 'dwiguna_jumlah_pembayaran_pensiun', name: 'dwiguna_jumlah_pembayaran_pensiun' },
{ data: 'dwiguna_jumlah_pembayaran_meninggal', name: 'dwiguna_jumlah_pembayaran_meninggal' },
{ data: 'dwiguna_jumlah_pembayaran_keluar', name: 'dwiguna_jumlah_pembayaran_keluar' },
{ data: 'dwiguna_si_hp_pensiun', name: 'dwiguna_si_hp_pensiun' },
{ data: 'dwiguna_si_hp_meninggal', name: 'dwiguna_si_hp_meninggal' },
{ data: 'dwiguna_si_hp_keluar', name: 'dwiguna_si_hp_keluar' },
{ data: 'askem_aktif_jumlah_klaim_pensiun', name: 'askem_aktif_jumlah_klaim_pensiun' },
{ data: 'askem_aktif_jumlah_klaim_meninggal', name: 'askem_aktif_jumlah_klaim_meninggal' },
{ data: 'askem_aktif_jumlah_klaim_keluar', name: 'askem_aktif_jumlah_klaim_keluar' },
{ data: 'askem_aktif_jumlah_pembayaran_pensiun', name: 'askem_aktif_jumlah_pembayaran_pensiun' },
{ data: 'askem_aktif_jumlah_pembayaran_meninggal', name: 'askem_aktif_jumlah_pembayaran_meninggal' },
{ data: 'askem_aktif_jumlah_pembayaran_keluar', name: 'askem_aktif_jumlah_pembayaran_keluar' },
{ data: 'askem_pensiun_jumlah_klaim_pensiun', name: 'askem_pensiun_jumlah_klaim_pensiun' },
{ data: 'askem_pensiun_jumlah_klaim_meninggal', name: 'askem_pensiun_jumlah_klaim_meninggal' },
{ data: 'askem_pensiun_jumlah_klaim_keluar', name: 'askem_pensiun_jumlah_klaim_keluar' },
{ data: 'askem_pensiun_jumlah_pembayaran_pensiun', name: 'askem_pensiun_jumlah_pembayaran_pensiun' },
{ data: 'askem_pensiun_jumlah_pembayaran_meninggal', name: 'askem_pensiun_jumlah_pembayaran_meninggal' },
{ data: 'askem_pensiun_jumlah_pembayaran_keluar', name: 'askem_pensiun_jumlah_pembayaran_keluar' },
{ data: 'total_manfaat', name: 'total_manfaat' },
{ data: 'kmpmd_asuransi_dwiguna', name: 'kmpmd_asuransi_dwiguna' },
{ data: 'kmpmd_asuransi_kematian', name: 'kmpmd_asuransi_kematian' },
{ data: 'kenaikan_kmpmd', name: 'kenaikan_kmpmd' },
{ data: 'liabilitas', name: 'liabilitas' },
{ data: 'actions', name: '{{ trans('global.actions') }}' }
    ],
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  };
  let table = $('.datatable-LiabilityTht').DataTable(dtOverrideGlobals);
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
});

</script>
@endsection