@extends('layouts.app-login')

@section('title', 'Forgot Password')

@section('page', 'login-page')

@section('content-login')
<div class="card-body login-card-body">
    <p class="login-box-msg">{{ __('You forgot your password? Here you can easily retrieve a new password.') }}</p>

    <form method="POST" action="{{ route('password.email') }}">
      <div class="input-group mb-3">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address...') }}" name="email" value="{{ old('email') }}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="row">
        <div class="col-12">
          <button type="submit" class="btn btn-primary btn-block">{{ __('Send Password Reset Link') }}</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <p class="mt-3 mb-1 text-center">
      <a href="{{ asset('login') }}">{{ __('Login') }}</a>
    </p>
  </div>
  <!-- /.login-card-body -->
</div>
@endsection
