@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.cv.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cvs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.cv.fields.id') }}
                        </th>
                        <td>
                            {{ $cv->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cv.fields.cv') }}
                        </th>
                        <td>
                            @if($cv->cv)
                                <a href="{{ $cv->cv->getUrl() }}" target="_blank">
                                    {{ trans('global.view_file') }}
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.cv.fields.is_main') }}
                        </th>
                        <td>
                            <input type="checkbox" disabled="disabled" {{ $cv->is_main ? 'checked' : '' }}>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.cvs.index') }}">
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
            <a class="nav-link" href="#cv_applicatnts" role="tab" data-toggle="tab">
                {{ trans('cruds.applicatnt.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="cv_applicatnts">
            @includeIf('admin.cvs.relationships.cvApplicatnts', ['applicatnts' => $cv->cvApplicatnts])
        </div>
    </div>
</div>

@endsection