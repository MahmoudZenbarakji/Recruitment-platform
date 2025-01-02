@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.review.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reviews.update", [$review->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="company_id">{{ trans('cruds.review.fields.company') }}</label>
                <select class="form-control select2 {{ $errors->has('company') ? 'is-invalid' : '' }}" name="company_id" id="company_id" required>
                    @foreach($companies as $id => $entry)
                        <option value="{{ $id }}" {{ (old('company_id') ? old('company_id') : $review->company->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('company'))
                    <span class="text-danger">{{ $errors->first('company') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.review.fields.company_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="applicant_id">{{ trans('cruds.review.fields.applicant') }}</label>
                <select class="form-control select2 {{ $errors->has('applicant') ? 'is-invalid' : '' }}" name="applicant_id" id="applicant_id">
                    @foreach($applicants as $id => $entry)
                        <option value="{{ $id }}" {{ (old('applicant_id') ? old('applicant_id') : $review->applicant->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('applicant'))
                    <span class="text-danger">{{ $errors->first('applicant') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.review.fields.applicant_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="rate">{{ trans('cruds.review.fields.rate') }}</label>
                <input class="form-control {{ $errors->has('rate') ? 'is-invalid' : '' }}" type="number" name="rate" id="rate" value="{{ old('rate', $review->rate) }}" step="0.1" required max="5">
                @if($errors->has('rate'))
                    <span class="text-danger">{{ $errors->first('rate') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.review.fields.rate_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="comment">{{ trans('cruds.review.fields.comment') }}</label>
                <textarea class="form-control {{ $errors->has('comment') ? 'is-invalid' : '' }}" name="comment" id="comment">{{ old('comment', $review->comment) }}</textarea>
                @if($errors->has('comment'))
                    <span class="text-danger">{{ $errors->first('comment') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.review.fields.comment_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.review.fields.status') }}</label>
                <select class="form-control {{ $errors->has('status') ? 'is-invalid' : '' }}" name="status" id="status" required>
                    <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Review::STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('status', $review->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('status'))
                    <span class="text-danger">{{ $errors->first('status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.review.fields.status_helper') }}</span>
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