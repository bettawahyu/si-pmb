@extends('manage.auth.auth')
@section('content')
    <form method="POST" action="{{ route("manage.password.email") }}" class="needs-validation" novalidate>
        @csrf
        @if(session()->has('error'))
            <div class="alert alert-danger invalid-feedback d-block">{{ session()->get('error') }}</div>
        @endif
        @if(session()->has('message_sent'))
            <div class="alert alert-success invalid-feedback d-block">{{ session()->get('message_sent') }}</div>
        @else
        <label for="email" class="mb-1">{{ trans('dokre.email') }}:</label>
        <input type="text" class="form-control mb-1" required="true" id="email" name="email" placeholder="{{ trans('dokre.username') }}" value="{{ old('email') }}" autofocus>
        @if ($errors->has('email'))
            <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>
        @endif
        <div class="invalid-feedback">{{ trans('dokre.required_username') }}</div>
        <div class="row">
            <div class="mt-2">
                <button type="submit" class="btn btn-primary w-100">{{trans('dokre.reset_password_button')}}</button>
            </div>
        </div>
        @endif
    </form>
@endsection