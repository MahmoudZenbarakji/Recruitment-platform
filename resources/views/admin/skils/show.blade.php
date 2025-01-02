@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.skil.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.skils.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.skil.fields.id') }}
                        </th>
                        <td>
                            {{ $skil->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.skil.fields.name') }}
                        </th>
                        <td>
                            {{ $skil->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.skil.fields.description') }}
                        </th>
                        <td>
                            {{ $skil->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.skils.index') }}">
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
            <a class="nav-link" href="#skills_jobs" role="tab" data-toggle="tab">
                {{ trans('cruds.job.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#skills_applicatnts" role="tab" data-toggle="tab">
                {{ trans('cruds.applicatnt.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="skills_jobs">
            @includeIf('admin.skils.relationships.skillsJobs', ['jobs' => $skil->skillsJobs])
        </div>
        <div class="tab-pane" role="tabpanel" id="skills_applicatnts">
            @includeIf('admin.skils.relationships.skillsApplicatnts', ['applicatnts' => $skil->skillsApplicatnts])
        </div>
    </div>
</div>

@endsection