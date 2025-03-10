@extends('layouts.admin')
@section('content')
<div class="content">
    @can('liability_portofolio_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.liability-portofolios.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.liabilityPortofolio.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('cruds.liabilityPortofolio.title_singular') }} {{ trans('global.list') }}
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable datatable-LiabilityPortofolio">
                            <thead>
                                <tr>
                                    <th width="10">

                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.biaya') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.yield_curve') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.name') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.description') }}
                                    </th>
                                    <th>
                                        {{ trans('cruds.liabilityPortofolio.fields.date') }}
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($liabilityPortofolios as $key => $liabilityPortofolio)
                                    <tr data-entry-id="{{ $liabilityPortofolio->id }}">
                                        <td>

                                        </td>
                                        <td>
                                            {{ $liabilityPortofolio->biaya->nama ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityPortofolio->yield_curve->version_name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityPortofolio->name ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityPortofolio->description ?? '' }}
                                        </td>
                                        <td>
                                            {{ $liabilityPortofolio->date ?? '' }}
                                        </td>
                                        <td>
                                            @can('liability_portofolio_show')
                                                <a class="btn btn-xs btn-primary" href="{{ route('admin.liability-portofolios.show', $liabilityPortofolio->id) }}">
                                                    {{ trans('global.view') }}
                                                </a>
                                            @endcan

                                            @can('liability_portofolio_edit')
                                                <a class="btn btn-xs btn-info" href="{{ route('admin.liability-portofolios.edit', $liabilityPortofolio->id) }}">
                                                    {{ trans('global.edit') }}
                                                </a>
                                            @endcan

                                            @can('liability_portofolio_delete')
                                                <form action="{{ route('admin.liability-portofolios.destroy', $liabilityPortofolio->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('liability_portofolio_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.liability-portofolios.massDestroy') }}",
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
  let table = $('.datatable-LiabilityPortofolio:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection