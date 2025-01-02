@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.salary.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.salaries.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="range">{{ trans('cruds.salary.fields.range') }}</label>
                <input class="form-control {{ $errors->has('range') ? 'is-invalid' : '' }}" type="text" name="range" id="range" value="{{ old('range', '') }}" required>
                @if($errors->has('range'))
                    <span class="text-danger">{{ $errors->first('range') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.range_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_active') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" required {{ old('is_active', 0) == 1 || old('is_active') === null ? 'checked' : '' }}>
                    <label class="required form-check-label" for="is_active">{{ trans('cruds.salary.fields.is_active') }}</label>
                </div>
                @if($errors->has('is_active'))
                    <span class="text-danger">{{ $errors->first('is_active') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.salary.fields.is_active_helper') }}</span>
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