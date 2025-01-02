@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.applicatnt.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applicatnts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.applicatnt.fields.id') }}
                        </th>
                        <td>
                            {{ $applicatnt->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicatnt.fields.user') }}
                        </th>
                        <td>
                            {{ $applicatnt->user->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicatnt.fields.full_name') }}
                        </th>
                        <td>
                            {{ $applicatnt->full_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicatnt.fields.education_level') }}
                        </th>
                        <td>
                            {{ App\Models\Applicatnt::EDUCATION_LEVEL_SELECT[$applicatnt->education_level] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicatnt.fields.experience_year') }}
                        </th>
                        <td>
                            {{ $applicatnt->experience_year }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicatnt.fields.salary') }}
                        </th>
                        <td>
                            {{ $applicatnt->salary->range ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicatnt.fields.nationality') }}
                        </th>
                        <td>
                            {{ $applicatnt->nationality->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicatnt.fields.gender') }}
                        </th>
                        <td>
                            {{ App\Models\Applicatnt::GENDER_SELECT[$applicatnt->gender] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicatnt.fields.other_phone_number') }}
                        </th>
                        <td>
                            {{ $applicatnt->other_phone_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicatnt.fields.birthday') }}
                        </th>
                        <td>
                            {{ $applicatnt->birthday }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicatnt.fields.cv') }}
                        </th>
                        <td>
                            @foreach($applicatnt->cvs as $key => $cv)
                                <span class="label label-info">{{ $cv->is_main }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicatnt.fields.image') }}
                        </th>
                        <td>
                            @if($applicatnt->image)
                                <a href="{{ $applicatnt->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $applicatnt->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.applicatnt.fields.skills') }}
                        </th>
                        <td>
                            @foreach($applicatnt->skills as $key => $skills)
                                <span class="label label-info">{{ $skills->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.applicatnts.index') }}">
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
            <a class="nav-link" href="#applicant_reviews" role="tab" data-toggle="tab">
                {{ trans('cruds.review.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#applicant_applications" role="tab" data-toggle="tab">
                {{ trans('cruds.application.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="applicant_reviews">
            @includeIf('admin.applicatnts.relationships.applicantReviews', ['reviews' => $applicatnt->applicantReviews])
        </div>
        <div class="tab-pane" role="tabpanel" id="applicant_applications">
            @includeIf('admin.applicatnts.relationships.applicantApplications', ['applications' => $applicatnt->applicantApplications])
        </div>
    </div>
</div>

@endsection