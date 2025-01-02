@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.nationality.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.nationalities.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.nationality.fields.id') }}
                        </th>
                        <td>
                            {{ $nationality->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.nationality.fields.name') }}
                        </th>
                        <td>
                            {{ $nationality->name }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.nationalities.index') }}">
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
            <a class="nav-link" href="#nationality_applicatnts" role="tab" data-toggle="tab">
                {{ trans('cruds.applicatnt.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="nationality_applicatnts">
            @includeIf('admin.nationalities.relationships.nationalityApplicatnts', ['applicatnts' => $nationality->nationalityApplicatnts])
        </div>
    </div>
</div>

@endsection