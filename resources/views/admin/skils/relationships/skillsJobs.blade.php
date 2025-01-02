<div class="m-3">
    @can('job_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.jobs.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.job.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.job.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-skillsJobs">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.job.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.job.fields.title') }}
                            </th>
                            <th>
                                {{ trans('cruds.job.fields.type') }}
                            </th>
                            <th>
                                {{ trans('cruds.job.fields.salary') }}
                            </th>
                            <th>
                                {{ trans('cruds.salary.fields.is_active') }}
                            </th>
                            <th>
                                {{ trans('cruds.job.fields.description') }}
                            </th>
                            <th>
                                {{ trans('cruds.job.fields.experiences_year') }}
                            </th>
                            <th>
                                {{ trans('cruds.job.fields.company') }}
                            </th>
                            <th>
                                {{ trans('cruds.job.fields.status') }}
                            </th>
                            <th>
                                {{ trans('cruds.job.fields.closed_date') }}
                            </th>
                            <th>
                                {{ trans('cruds.job.fields.skills') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jobs as $key => $job)
                            <tr data-entry-id="{{ $job->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $job->id ?? '' }}
                                </td>
                                <td>
                                    {{ $job->title ?? '' }}
                                </td>
                                <td>
                                    {{ $job->type->name ?? '' }}
                                </td>
                                <td>
                                    {{ $job->salary->range ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $job->salary->is_active ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $job->salary->is_active ? 'checked' : '' }}>
                                </td>
                                <td>
                                    {{ $job->description ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Job::EXPERIENCES_YEAR_SELECT[$job->experiences_year] ?? '' }}
                                </td>
                                <td>
                                    {{ $job->company->company_name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Job::STATUS_SELECT[$job->status] ?? '' }}
                                </td>
                                <td>
                                    {{ $job->closed_date ?? '' }}
                                </td>
                                <td>
                                    @foreach($job->skills as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('job_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.jobs.show', $job->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('job_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.jobs.edit', $job->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('job_delete')
                                        <form action="{{ route('admin.jobs.destroy', $job->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('job_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.jobs.massDestroy') }}",
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
    pageLength: 10,
  });
  let table = $('.datatable-skillsJobs:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection