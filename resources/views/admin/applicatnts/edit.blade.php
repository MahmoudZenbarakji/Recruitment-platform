@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.applicatnt.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.applicatnts.update", [$applicatnt->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.applicatnt.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $applicatnt->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.applicatnt.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="full_name">{{ trans('cruds.applicatnt.fields.full_name') }}</label>
                <input class="form-control {{ $errors->has('full_name') ? 'is-invalid' : '' }}" type="text" name="full_name" id="full_name" value="{{ old('full_name', $applicatnt->full_name) }}" required>
                @if($errors->has('full_name'))
                    <span class="text-danger">{{ $errors->first('full_name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.applicatnt.fields.full_name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.applicatnt.fields.education_level') }}</label>
                <select class="form-control {{ $errors->has('education_level') ? 'is-invalid' : '' }}" name="education_level" id="education_level" required>
                    <option value disabled {{ old('education_level', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Applicatnt::EDUCATION_LEVEL_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('education_level', $applicatnt->education_level) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('education_level'))
                    <span class="text-danger">{{ $errors->first('education_level') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.applicatnt.fields.education_level_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="experience_year">{{ trans('cruds.applicatnt.fields.experience_year') }}</label>
                <input class="form-control {{ $errors->has('experience_year') ? 'is-invalid' : '' }}" type="text" name="experience_year" id="experience_year" value="{{ old('experience_year', $applicatnt->experience_year) }}" required>
                @if($errors->has('experience_year'))
                    <span class="text-danger">{{ $errors->first('experience_year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.applicatnt.fields.experience_year_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="salary_id">{{ trans('cruds.applicatnt.fields.salary') }}</label>
                <select class="form-control select2 {{ $errors->has('salary') ? 'is-invalid' : '' }}" name="salary_id" id="salary_id" required>
                    @foreach($salaries as $id => $entry)
                        <option value="{{ $id }}" {{ (old('salary_id') ? old('salary_id') : $applicatnt->salary->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('salary'))
                    <span class="text-danger">{{ $errors->first('salary') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.applicatnt.fields.salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="nationality_id">{{ trans('cruds.applicatnt.fields.nationality') }}</label>
                <select class="form-control select2 {{ $errors->has('nationality') ? 'is-invalid' : '' }}" name="nationality_id" id="nationality_id" required>
                    @foreach($nationalities as $id => $entry)
                        <option value="{{ $id }}" {{ (old('nationality_id') ? old('nationality_id') : $applicatnt->nationality->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('nationality'))
                    <span class="text-danger">{{ $errors->first('nationality') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.applicatnt.fields.nationality_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.applicatnt.fields.gender') }}</label>
                <select class="form-control {{ $errors->has('gender') ? 'is-invalid' : '' }}" name="gender" id="gender" required>
                    <option value disabled {{ old('gender', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Applicatnt::GENDER_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('gender', $applicatnt->gender) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('gender'))
                    <span class="text-danger">{{ $errors->first('gender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.applicatnt.fields.gender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="other_phone_number">{{ trans('cruds.applicatnt.fields.other_phone_number') }}</label>
                <input class="form-control {{ $errors->has('other_phone_number') ? 'is-invalid' : '' }}" type="text" name="other_phone_number" id="other_phone_number" value="{{ old('other_phone_number', $applicatnt->other_phone_number) }}">
                @if($errors->has('other_phone_number'))
                    <span class="text-danger">{{ $errors->first('other_phone_number') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.applicatnt.fields.other_phone_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="birthday">{{ trans('cruds.applicatnt.fields.birthday') }}</label>
                <input class="form-control date {{ $errors->has('birthday') ? 'is-invalid' : '' }}" type="text" name="birthday" id="birthday" value="{{ old('birthday', $applicatnt->birthday) }}" required>
                @if($errors->has('birthday'))
                    <span class="text-danger">{{ $errors->first('birthday') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.applicatnt.fields.birthday_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cvs">{{ trans('cruds.applicatnt.fields.cv') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('cvs') ? 'is-invalid' : '' }}" name="cvs[]" id="cvs" multiple required>
                    @foreach($cvs as $id => $cv)
                        <option value="{{ $id }}" {{ (in_array($id, old('cvs', [])) || $applicatnt->cvs->contains($id)) ? 'selected' : '' }}>{{ $cv }}</option>
                    @endforeach
                </select>
                @if($errors->has('cvs'))
                    <span class="text-danger">{{ $errors->first('cvs') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.applicatnt.fields.cv_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.applicatnt.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <span class="text-danger">{{ $errors->first('image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.applicatnt.fields.image_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="skills">{{ trans('cruds.applicatnt.fields.skills') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('skills') ? 'is-invalid' : '' }}" name="skills[]" id="skills" multiple required>
                    @foreach($skills as $id => $skill)
                        <option value="{{ $id }}" {{ (in_array($id, old('skills', [])) || $applicatnt->skills->contains($id)) ? 'selected' : '' }}>{{ $skill }}</option>
                    @endforeach
                </select>
                @if($errors->has('skills'))
                    <span class="text-danger">{{ $errors->first('skills') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.applicatnt.fields.skills_helper') }}</span>
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

@section('scripts')
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.applicatnts.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 1080,
      height: 1080
    },
    success: function (file, response) {
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($applicatnt) && $applicatnt->image)
      var file = {!! json_encode($applicatnt->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script>
@endsection