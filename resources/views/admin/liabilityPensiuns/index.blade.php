@extends('layouts.admin')
@section('content')
<div class="content">
    @can('liability_pensiun_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.liability-pensiuns.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.liabilityPensiun.title_singular') }}
                </a>
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
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-LiabilityPensiun">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityPensiun.fields.id') }}
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
                            <tbody>
                                @foreach($liabilityPensiuns as $key => $liabilityPensiun)
                                    <tr data-entry-id="{{ $liabilityPensiun->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $liabilityPensiun->id ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityPensiun->liability_portofolio->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityPensiun->report_date ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityPensiun->skenario ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityPensiun->tahun ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityPensiun->peserta_pensiun ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityPensiun->iuran ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityPensiun->spppip ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityPensiun->pembayaran_manfaat ?? '' }}
                                        </td>
                                        <td>
                                            @can('liability_pensiun_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.liability-pensiuns.show', $liabilityPensiun->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('liability_pensiun_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.liability-pensiuns.edit', $liabilityPensiun->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('liability_pensiun_delete')
                                                <form action="{{ route('admin.liability-pensiuns.destroy', $liabilityPensiun->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('liability_pensiun_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.liability-pensiuns.massDestroy') }}",
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
  let table = $('.datatable-LiabilityPensiun:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection