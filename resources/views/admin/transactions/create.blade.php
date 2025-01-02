@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.transaction.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.transactions.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="net_total">{{ trans('cruds.transaction.fields.net_total') }}</label>
                <input class="form-control {{ $errors->has('net_total') ? 'is-invalid' : '' }}" type="number" name="net_total" id="net_total" value="{{ old('net_total', '') }}" step="0.01">
                @if($errors->has('net_total'))
                    <span class="text-danger">{{ $errors->first('net_total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.net_total_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="sub_total">{{ trans('cruds.transaction.fields.sub_total') }}</label>
                <input class="form-control {{ $errors->has('sub_total') ? 'is-invalid' : '' }}" type="number" name="sub_total" id="sub_total" value="{{ old('sub_total', '') }}" step="0.01">
                @if($errors->has('sub_total'))
                    <span class="text-danger">{{ $errors->first('sub_total') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.sub_total_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="vat">{{ trans('cruds.transaction.fields.vat') }}</label>
                <input class="form-control {{ $errors->has('vat') ? 'is-invalid' : '' }}" type="number" name="vat" id="vat" value="{{ old('vat', '0') }}" step="0.01" required>
                @if($errors->has('vat'))
                    <span class="text-danger">{{ $errors->first('vat') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.vat_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="discount">{{ trans('cruds.transaction.fields.discount') }}</label>
                <input class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" type="number" name="discount" id="discount" value="{{ old('discount', '0') }}" step="0.01" required>
                @if($errors->has('discount'))
                    <span class="text-danger">{{ $errors->first('discount') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.discount_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.transaction.fields.payment_status') }}</label>
                <select class="form-control {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" name="payment_status" id="payment_status" required>
                    <option value disabled {{ old('payment_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Transaction::PAYMENT_STATUS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_status', 'draft') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('payment_status'))
                    <span class="text-danger">{{ $errors->first('payment_status') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.transaction.fields.payment_status_helper') }}</span>
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