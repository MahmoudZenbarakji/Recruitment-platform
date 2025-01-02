@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.job.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.jobs.update", [$job->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="title">{{ trans('cruds.job.fields.title') }}</label>
                <input class="form-control {{ $errors->has('title') ? 'is-invalid' : '' }}" type="text" name="title" id="title" value="{{ old('title', $job->title) }}" required>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="type_id">{{ trans('cruds.job.fields.type') }}</label>
                <select class="form-control select2 {{ $errors->has('type') ? 'is-invalid' : '' }}" name="type_id" id="type_id" required>
                    @foreach($types as $id => $entry)
                        <option value="{{ $id }}" {{ (old('type_id') ? old('type_id') : $job->type->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('type'))
                    <span class="text-danger">{{ $errors->first('type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.type_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="salary_id">{{ trans('cruds.job.fields.salary') }}</label>
                <select class="form-control select2 {{ $errors->has('salary') ? 'is-invalid' : '' }}" name="salary_id" id="salary_id" required>
                    @foreach($salaries as $id => $entry)
                        <option value="{{ $id }}" {{ (old('salary_id') ? old('salary_id') : $job->salary->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('salary'))
                    <span class="text-danger">{{ $errors->first('salary') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.job.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description', $job->description) }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.job.fields.experiences_year') }}</label>
                <select class="form-control {{ $errors->has('experiences_year') ? 'is-invalid' : '' }}" name="experiences_year" id="experiences_year" required>
                    <option value disabled {{ old('experiences_year', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Job::EXPERIENCES_YEAR_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('experiences_year', $job->experiences_year) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('experiences_year'))
                    <span class="text-danger">{{ $errors->first('experiences_year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.experiences_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="company_id">{{ trans('cruds.job.fields.company') }}</label>
                <select class="form-control select2 {{ $errors->has('company') ? 'is-invalid' : '' }}" name="company_id" id="company_id" required>
                    @foreach($companies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('company_id') ? old('company_id') : $job->company->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('company'))
                    <span class="text-danger">{{ $errors->first('company') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.job.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Job::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $job->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="closed_date">{{ trans('cruds.job.fields.closed_date') }}</label>
                <input class="form-control datetime {{ $errors->has('closed_date') ? 'is-invalid' : '' }}" type="text" name="closed_date" id="closed_date" value="{{ old('closed_date', $job->closed_date) }}" required>
                @if($errors->has('closed_date'))
                    <span class="text-danger">{{ $errors->first('closed_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.closed_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="skills">{{ trans('cruds.job.fields.skills') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('skills') ? 'is-invalid' : '' }}" name="skills[]" id="skills" multiple required>
                    @foreach($skills as $id => $skill)
                        <option value="{{ $id }}" {{ (in_array($id, old('skills', [])) || $job->skills->contains($id)) ? 'selected' : '' }}>{{ $skill }}</option>
                    @endforeach
                </select>
                @if($errors->has('skills'))
                    <span class="text-danger">{{ $errors->first('skills') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.job.fields.skills_helper') }}</span>
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