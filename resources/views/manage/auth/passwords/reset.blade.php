@extends('manage.auth.auth')
@section('content')
    <form method="POST" action="{{ route("manage.password.update",$reset_token) }}" class="needs-validation" novalidate>
        @csrf
        @if(session()->has('error'))
            <div class="alert alert-danger invalid-feedback d-block">{{ session()->get('error') }}</div>
        @endif
        <label for="password" class="mb-1">{{ trans('dokre.password') }}:</label>
        <input type="password" class="form-control mb-1" id="password" required="true" name="password" placeholder="{{ trans('dokre.password') }}">
        @if ($errors->has('password'))
            <div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>
        @endif
        <div class="invalid-feedback">
            {{ trans('dokre.required_password') }}
        </div>
        <label for="password_confirmation" class="mb-1">{{ trans('dokre.password_confirmation') }}:</label>
        <input type="password" class="form-control mb-1" id="password_confirmation" required="true" name="password_confirmation" placeholder="{{ trans('dokre.password_confirmation') }}">
        @if ($errors->has('password_confirmation'))
            <div class="invalid-feedback d-block">{{ $errors->first('password_confirmation') }}</div>
        @endif
        <div class="invalid-feedback">
            {{ trans('dokre.password_confirmation') }}
        </div>

        <div class="row">
            <div class="mt-2">
                <button type="submit" class="btn btn-primary w-100">{{ trans('dokre.reset_password_button') }}</button>
            </div>
        </div>
    </form>
@endsection