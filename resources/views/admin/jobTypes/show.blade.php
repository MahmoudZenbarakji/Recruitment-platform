@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jobType.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.job-types.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jobType.fields.id') }}
                        </th>
                        <td>
                            {{ $jobType->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobType.fields.name') }}
                        </th>
                        <td>
                            {{ $jobType->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jobType.fields.description') }}
                        </th>
                        <td>
                            {{ $jobType->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.job-types.index') }}">
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
            <a class="nav-link" href="#type_jobs" role="tab" data-toggle="tab">
                {{ trans('cruds.job.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="type_jobs">
            @includeIf('admin.jobTypes.relationships.typeJobs', ['jobs' => $jobType->typeJobs])
        </div>
    </div>
</div>

@endsection