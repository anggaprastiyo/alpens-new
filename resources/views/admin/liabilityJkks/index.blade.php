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
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-LiabilityJkk">
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
                            <tbody>
                                @foreach($liabilityJkks as $key => $liabilityJkk)
                                    <tr data-entry-id="{{ $liabilityJkk->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $liabilityJkk->liability_portofolio->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkk->skenario ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkk->tahun ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkk->kps_jumlah_peserta_baru ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkk->kps_jumlah_peserta_aktif ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkk->iuran ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkk->jumlah_kejadian ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkk->pembayaran_manfaat ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkk->cadangan_teknis ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkk->cadangan_teknis_ibnr ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkk->kenaikan_cadangan_teknis_ekdp ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkk->kenaikan_cadangan_teknis_ibnr ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityJkk->rasio_klaim ?? '' }}
                                        </td>
                                        <td>
                                            @can('liability_jkk_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.liability-jkks.show', $liabilityJkk->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('liability_jkk_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.liability-jkks.edit', $liabilityJkk->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('liability_jkk_delete')
                                                <form action="{{ route('admin.liability-jkks.destroy', $liabilityJkk->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('liability_jkk_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.liability-jkks.massDestroy') }}",
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
  let table = $('.datatable-LiabilityJkk:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection