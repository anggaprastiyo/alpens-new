@extends('layouts.admin')
@section('content')
<div class="content">
    @can('liability_jkm_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.liability-jkms.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.liabilityJkm.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.liabilityJkm.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-LiabilityJkm">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.liability_portofolio') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.skenario') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.tahun') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.kps_jumlah_peserta_baru') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.kps_jumlah_peserta_aktif') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.iuran') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.jumlah_kejadian') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.pembayaran_manfaat') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.cadangan_teknis') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.cadangan_teknis_ibnr') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.kenaikan_cadangan_teknis_ekdp') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.kenaikan_cadangan_teknis_ibnr') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityJkm.fields.rasio_klaim') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($liabilityJkms as $key => $liabilityJkm)
                                    <tr data-entry-id="{{ $liabilityJkm->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $liabilityJkm->liability_portofolio->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkm->skenario ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkm->tahun ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkm->kps_jumlah_peserta_baru ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkm->kps_jumlah_peserta_aktif ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkm->iuran ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkm->jumlah_kejadian ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkm->pembayaran_manfaat ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkm->cadangan_teknis ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkm->cadangan_teknis_ibnr ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkm->kenaikan_cadangan_teknis_ekdp ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkm->kenaikan_cadangan_teknis_ibnr ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkm->rasio_klaim ?? '' }}
                                        </td>
                                        <td>
                                            @can('liability_jkm_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.liability-jkms.show', $liabilityJkm->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('liability_jkm_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.liability-jkms.edit', $liabilityJkm->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('liability_jkm_delete')
                                                <form action="{{ route('admin.liability-jkms.destroy', $liabilityJkm->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('liability_jkm_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.liability-jkms.massDestroy') }}",
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
  let table = $('.datatable-LiabilityJkm:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection