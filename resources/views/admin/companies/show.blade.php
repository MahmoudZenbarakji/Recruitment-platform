@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.company.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.companies.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.id') }}
                        </th>
                        <td>
                            {{ $company->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.company_name') }}
                        </th>
                        <td>
                            {{ $company->company_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.description') }}
                        </th>
                        <td>
                            {{ $company->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.image') }}
                        </th>
                        <td>
                            @if($company->image)
                                <a href="{{ $company->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $company->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.website') }}
                        </th>
                        <td>
                            {{ $company->website }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.size') }}
                        </th>
                        <td>
                            {{ $company->size }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.company.fields.industries') }}
                        </th>
                        <td>
                            @foreach($company->industries as $key => $industries)
                                <span class="label label-info">{{ $industries->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.companies.index') }}">
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
            <a class="nav-link" href="#company_payments" role="tab" data-toggle="tab">
                {{ trans('cruds.payment.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#company_jobs" role="tab" data-toggle="tab">
                {{ trans('cruds.job.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#company_reviews" role="tab" data-toggle="tab">
                {{ trans('cruds.review.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="company_payments">
            @includeIf('admin.companies.relationships.companyPayments', ['payments' => $company->companyPayments])
        </div>
        <div class="tab-pane" role="tabpanel" id="company_jobs">
            @includeIf('admin.companies.relationships.companyJobs', ['jobs' => $company->companyJobs])
        </div>
        <div class="tab-pane" role="tabpanel" id="company_reviews">
            @includeIf('admin.companies.relationships.companyReviews', ['reviews' => $company->companyReviews])
        </div>
    </div>
</div>

@endsection