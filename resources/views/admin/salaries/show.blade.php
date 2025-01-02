@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salary.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.salaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.id') }}
                        </th>
                        <td>
                            {{ $salary->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.range') }}
                        </th>
                        <td>
                            {{ $salary->range }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salary.fields.is_active') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $salary->is_active ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.salaries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#salary_jobs" role="tab" data-toggle="tab">
                {{ trans('cruds.job.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#salary_applicatnts" role="tab" data-toggle="tab">
                {{ trans('cruds.applicatnt.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="salary_jobs">
            @includeIf('admin.salaries.relationships.salaryJobs', ['jobs' => $salary->salaryJobs])
        </div>
        <div class="tab-pane" role="tabpanel" id="salary_applicatnts">
            @includeIf('admin.salaries.relationships.salaryApplicatnts', ['applicatnts' => $salary->salaryApplicatnts])
        </div>
    </div>
</div>

@endsection