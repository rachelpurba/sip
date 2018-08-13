@extends('layouts.app')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <b>Sign In</b>
  </div>
  <div class="login-box-body">
    <p class="login-box-msg"><b>Masuk ke akun anda</b></p>

    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
      {{ csrf_field() }}
      <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
        <input id="username" type="username" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required autofocus>
         @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
         @endif
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
        <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
         @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
         @endif
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
            </label>
          </div>
        </div>
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
  </div>
</div>
@endsection