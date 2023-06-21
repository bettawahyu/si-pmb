@extends('manage.auth.auth')
@section('content')
    <form method="POST" action="{{ route("manage.login") }}" class="needs-validation" novalidate>
        @csrf
        @if(session()->has('error'))
            <div class="alert alert-danger invalid-feedback d-block">{{ session()->get('error') }}</div>
        @endif
        <div class="imgcontainer">
            <img src="{{asset('upload/logo/lotus-with-hands-gf46915943_640.png')}}" alt="Avatar" class="avatar" width="25%">
        </div>
        <label for="email" class="mb-1">{{ trans('dokre.email') }}:</label>
        <input type="text" class="form-control mb-1" required="true" id="email" name="email" placeholder="{{ trans('dokre.username') }}" value="{{ old('email') }}" autofocus>
        @if ($errors->has('email'))
            <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>
        @endif
        <div class="invalid-feedback">{{ trans('dokre.required_username') }}</div>
        <label for="password" class="mb-1">{{ trans('dokre.password') }}:</label>
        <input type="password" class="form-control mb-1" id="password" required="true" name="password" placeholder="{{ trans('dokre.password') }}">
        @if ($errors->has('password'))
            <div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>
        @endif
        <div class="invalid-feedback">
            {{ trans('dokre.required_password') }}
        </div>
        <small><a href="{{ route("manage.password.request") }}">{{ trans('dokre.forgot_pass') }}</a></small>
        <div class="form-check my-2">
            <input class="form-check-input" type="checkbox" value="1" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ trans('dokre.remember_me') }}
            </label>
        </div>
        <div class="row">
            <div>
                <button type="submit" class="btn btn-primary w-100">{{ trans('dokre.login_button') }}</button>
            </div>
        </div>
    </form>
@endsection
