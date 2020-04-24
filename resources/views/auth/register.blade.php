@extends('layouts.app-login')

@section('title', 'Register')

@section('page', 'register-page')

@section('content-login')
<div class="card-body register-card-body">
    <p class="login-box-msg">{{ __('Register a new membership') }}</p>

    <form method="POST" action="{{ route('register') }}">
        @csrf
      <div class="input-group mb-3">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="{{ __('Name...') }}" name="name" value="{{ old('name') }}">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-user"></span>
          </div>
        </div>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
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
      <div class="input-group mb-3">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password...') }}" name="password">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
        @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
      </div>
      <div class="input-group mb-3">
        <input id="password-confirm" type="password" class="form-control" placeholder="{{ __('Confirm Password...') }}" name="password_confirmation">
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-8">
          <div class="icheck-primary">
            <input type="checkbox" id="agreeTerms" name="terms" value="agree">
            <label for="agreeTerms">
                {{ __('I agree to the ') }}<a href="#">{{ __('terms') }}</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-4">
          <button type="submit" class="btn btn-primary btn-block">{{ __('Register') }}</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-primary">
        <i class="fab fa-facebook mr-2"></i>
        {{ __('Sign up using Facebook') }}
      </a>
      <a href="#" class="btn btn-block btn-danger">
        <i class="fab fa-google-plus mr-2"></i>
        {{ __('Sign up using Google+') }}
      </a>
    </div>

    <a href="{{ route('login') }}" class="text-center">{{ __('I already have a membership') }}</a>
  </div>
  <!-- /.form-box -->
</div><!-- /.card -->
@endsection