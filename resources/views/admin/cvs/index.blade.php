@extends('layouts.admin')
@section('content')
@can('cv_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.cvs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.cv.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.cv.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Cv">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.cv.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.cv.fields.cv') }}
                        </th>
                        <th>
                            {{ trans('cruds.cv.fields.is_main') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cvs as $key => $cv)
                        <tr data-entry-id="{{ $cv->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $cv->id ?? '' }}
                            </td>
                            <td>
                                @if($cv->cv)
                                    <a href="{{ $cv->cv->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                <span style="display:none">{{ $cv->is_main ?? '' }}</span>
                                <input type="checkbox" disabled="disabled" {{ $cv->is_main ? 'checked' : '' }}>
                            </td>
                            <td>
                                @can('cv_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.cvs.show', $cv->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('cv_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.cvs.edit', $cv->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('cv_delete')
                                    <form action="{{ route('admin.cvs.destroy', $cv->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('cv_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.cvs.massDestroy') }}",
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
    pageLength: 25,
  });
  let table = $('.datatable-Cv:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection