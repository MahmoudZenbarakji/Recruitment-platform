<div class="m-3">
    @can('applicatnt_create')
        <div style="margin-bottom: 10px;" class="row">
            <div class="col-lg-12">
                <a class="btn btn-success" href="{{ route('admin.applicatnts.create') }}">
                    {{ trans('global.add') }} {{ trans('cruds.applicatnt.title_singular') }}
                </a>
            </div>
        </div>
    @endcan
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.applicatnt.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-salaryApplicatnts">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.applicatnt.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.applicatnt.fields.user') }}
                            </th>
                            <th>
                                {{ trans('cruds.applicatnt.fields.full_name') }}
                            </th>
                            <th>
                                {{ trans('cruds.applicatnt.fields.education_level') }}
                            </th>
                            <th>
                                {{ trans('cruds.applicatnt.fields.experience_year') }}
                            </th>
                            <th>
                                {{ trans('cruds.applicatnt.fields.salary') }}
                            </th>
                            <th>
                                {{ trans('cruds.salary.fields.is_active') }}
                            </th>
                            <th>
                                {{ trans('cruds.applicatnt.fields.nationality') }}
                            </th>
                            <th>
                                {{ trans('cruds.applicatnt.fields.gender') }}
                            </th>
                            <th>
                                {{ trans('cruds.applicatnt.fields.other_phone_number') }}
                            </th>
                            <th>
                                {{ trans('cruds.applicatnt.fields.birthday') }}
                            </th>
                            <th>
                                {{ trans('cruds.applicatnt.fields.cv') }}
                            </th>
                            <th>
                                {{ trans('cruds.applicatnt.fields.image') }}
                            </th>
                            <th>
                                {{ trans('cruds.applicatnt.fields.skills') }}
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applicatnts as $key => $applicatnt)
                            <tr data-entry-id="{{ $applicatnt->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $applicatnt->id ?? '' }}
                                </td>
                                <td>
                                    {{ $applicatnt->user->name ?? '' }}
                                </td>
                                <td>
                                    {{ $applicatnt->full_name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Applicatnt::EDUCATION_LEVEL_SELECT[$applicatnt->education_level] ?? '' }}
                                </td>
                                <td>
                                    {{ $applicatnt->experience_year ?? '' }}
                                </td>
                                <td>
                                    {{ $applicatnt->salary->range ?? '' }}
                                </td>
                                <td>
                                    <span style="display:none">{{ $applicatnt->salary->is_active ?? '' }}</span>
                                    <input type="checkbox" disabled="disabled" {{ $applicatnt->salary->is_active ? 'checked' : '' }}>
                                </td>
                                <td>
                                    {{ $applicatnt->nationality->name ?? '' }}
                                </td>
                                <td>
                                    {{ App\Models\Applicatnt::GENDER_SELECT[$applicatnt->gender] ?? '' }}
                                </td>
                                <td>
                                    {{ $applicatnt->other_phone_number ?? '' }}
                                </td>
                                <td>
                                    {{ $applicatnt->birthday ?? '' }}
                                </td>
                                <td>
                                    @foreach($applicatnt->cvs as $key => $item)
                                        <span class="badge badge-info">{{ $item->is_main }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @if($applicatnt->image)
                                        <a href="{{ $applicatnt->image->getUrl() }}" target="_blank" style="display: inline-block">
                                            <img src="{{ $applicatnt->image->getUrl('thumb') }}">
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    @foreach($applicatnt->skills as $key => $item)
                                        <span class="badge badge-info">{{ $item->name }}</span>
                                    @endforeach
                                </td>
                                <td>
                                    @can('applicatnt_show')
                                        <a class="btn btn-xs btn-primary" href="{{ route('admin.applicatnts.show', $applicatnt->id) }}">
                                            {{ trans('global.view') }}
                                        </a>
                                    @endcan

                                    @can('applicatnt_edit')
                                        <a class="btn btn-xs btn-info" href="{{ route('admin.applicatnts.edit', $applicatnt->id) }}">
                                            {{ trans('global.edit') }}
                                        </a>
                                    @endcan

                                    @can('applicatnt_delete')
                                        <form action="{{ route('admin.applicatnts.destroy', $applicatnt->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('applicatnt_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.applicatnts.massDestroy') }}",
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
  let table = $('.datatable-salaryApplicatnts:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection