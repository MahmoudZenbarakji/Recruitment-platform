@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.industry.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.industries.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.id') }}
                        </th>
                        <td>
                            {{ $industry->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.name') }}
                        </th>
                        <td>
                            {{ $industry->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.industry.fields.description') }}
                        </th>
                        <td>
                            {{ $industry->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.industries.index') }}">
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
            <a class="nav-link" href="#industries_companies" role="tab" data-toggle="tab">
                {{ trans('cruds.company.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="industries_companies">
            @includeIf('admin.industries.relationships.industriesCompanies', ['companies' => $industry->industriesCompanies])
        </div>
    </div>
</div>

@endsection