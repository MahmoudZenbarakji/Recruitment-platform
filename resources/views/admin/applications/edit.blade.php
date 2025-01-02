@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.application.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.applications.update", [$application->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="job_id">{{ trans('cruds.application.fields.job') }}</label>
                <select class="form-control select2 {{ $errors->has('job') ? 'is-invalid' : '' }}" name="job_id" id="job_id" required>
                    @foreach($jobs as $id => $entry)
                        <option value="{{ $id }}" {{ (old('job_id') ? old('job_id') : $application->job->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('job'))
                    <span class="text-danger">{{ $errors->first('job') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.job_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="applicant_id">{{ trans('cruds.application.fields.applicant') }}</label>
                <select class="form-control select2 {{ $errors->has('applicant') ? 'is-invalid' : '' }}" name="applicant_id" id="applicant_id">
                    @foreach($applicants as $id => $entry)
                        <option value="{{ $id }}" {{ (old('applicant_id') ? old('applicant_id') : $application->applicant->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('applicant'))
                    <span class="text-danger">{{ $errors->first('applicant') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.applicant_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.application.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Application::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $application->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="start_review">{{ trans('cruds.application.fields.start_review') }}</label>
                <input class="form-control datetime {{ $errors->has('start_review') ? 'is-invalid' : '' }}" type="text" name="start_review" id="start_review" value="{{ old('start_review', $application->start_review) }}">
                @if($errors->has('start_review'))
                    <span class="text-danger">{{ $errors->first('start_review') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.start_review_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="closed_date">{{ trans('cruds.application.fields.closed_date') }}</label>
                <input class="form-control datetime {{ $errors->has('closed_date') ? 'is-invalid' : '' }}" type="text" name="closed_date" id="closed_date" value="{{ old('closed_date', $application->closed_date) }}">
                @if($errors->has('closed_date'))
                    <span class="text-danger">{{ $errors->first('closed_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.application.fields.closed_date_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection