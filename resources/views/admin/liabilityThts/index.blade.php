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
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-LiabilityTht">
                            <thead>
                                <tr>
                                    <th width="10">

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
                            <tbody>
                                @foreach($liabilityThts as $key => $liabilityTht)
                                    <tr data-entry-id="{{ $liabilityTht->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $liabilityTht->liability_portofolio->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->report_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->skenario ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->tahun ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->kps_jumlah_pns_baru ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->kps_jumlah_peserta_aktif ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->pensiun_iuran ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->pensiun_manfaat ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->tht_iuran_tht ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->tht_iuran_si ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->dwiguna_jumlah_klaim_pensiun ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->dwiguna_jumlah_klaim_meninggal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->dwiguna_jumlah_klaim_keluar ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->dwiguna_jumlah_pembayaran_pensiun ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->dwiguna_jumlah_pembayaran_meninggal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->dwiguna_jumlah_pembayaran_keluar ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->dwiguna_si_hp_pensiun ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->dwiguna_si_hp_meninggal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->dwiguna_si_hp_keluar ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->askem_aktif_jumlah_klaim_pensiun ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->askem_aktif_jumlah_klaim_meninggal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->askem_aktif_jumlah_klaim_keluar ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->askem_aktif_jumlah_pembayaran_pensiun ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->askem_aktif_jumlah_pembayaran_meninggal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->askem_aktif_jumlah_pembayaran_keluar ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->askem_pensiun_jumlah_klaim_pensiun ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->askem_pensiun_jumlah_klaim_meninggal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->askem_pensiun_jumlah_klaim_keluar ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->askem_pensiun_jumlah_pembayaran_pensiun ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->askem_pensiun_jumlah_pembayaran_meninggal ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->askem_pensiun_jumlah_pembayaran_keluar ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->total_manfaat ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->kmpmd_asuransi_dwiguna ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->kmpmd_asuransi_kematian ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->kenaikan_kmpmd ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityTht->liabilitas ?? '' }}
                                        </td>
                                        <td>
                                            @can('liability_tht_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.liability-thts.show', $liabilityTht->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('liability_tht_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.liability-thts.edit', $liabilityTht->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('liability_tht_delete')
                                                <form action="{{ route('admin.liability-thts.destroy', $liabilityTht->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('liability_tht_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.liability-thts.massDestroy') }}",
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
  let table = $('.datatable-LiabilityTht:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection