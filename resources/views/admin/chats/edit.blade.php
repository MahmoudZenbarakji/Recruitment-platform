@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.chat.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.chats.update", [$chat->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="sender_id">{{ trans('cruds.chat.fields.sender') }}</label>
                <select class="form-control select2 {{ $errors->has('sender') ? 'is-invalid' : '' }}" name="sender_id" id="sender_id">
                    @foreach($senders as $id => $entry)
                        <option value="{{ $id }}" {{ (old('sender_id') ? old('sender_id') : $chat->sender->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('sender'))
                    <span class="text-danger">{{ $errors->first('sender') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.chat.fields.sender_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="receiver_id">{{ trans('cruds.chat.fields.receiver') }}</label>
                <select class="form-control select2 {{ $errors->has('receiver') ? 'is-invalid' : '' }}" name="receiver_id" id="receiver_id">
                    @foreach($receivers as $id => $entry)
                        <option value="{{ $id }}" {{ (old('receiver_id') ? old('receiver_id') : $chat->receiver->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('receiver'))
                    <span class="text-danger">{{ $errors->first('receiver') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.chat.fields.receiver_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="message">{{ trans('cruds.chat.fields.message') }}</label>
                <input class="form-control {{ $errors->has('message') ? 'is-invalid' : '' }}" type="text" name="message" id="message" value="{{ old('message', $chat->message) }}" required>
                @if($errors->has('message'))
                    <span class="text-danger">{{ $errors->first('message') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.chat.fields.message_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="form-check {{ $errors->has('is_read') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="checkbox" name="is_read" id="is_read" value="1" {{ $chat->is_read || old('is_read', 0) === 1 ? 'checked' : '' }} required>
                    <label class="required form-check-label" for="is_read">{{ trans('cruds.chat.fields.is_read') }}</label>
                </div>
                @if($errors->has('is_read'))
                    <span class="text-danger">{{ $errors->first('is_read') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.chat.fields.is_read_helper') }}</span>
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