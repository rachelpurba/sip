@extends('layouts.app')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <b>Daftar</b>
  </div>
  <div class="register-box-body">
    <p class="register-box-msg"><b>Daftar</b></p>
    <form action="{{ route('register') }}"  method="POST">
    {{ csrf_field() }}
      <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }} has-feedback">
        <input type="text" class="form-control" placeholder="Username" id="username" name="username" value="{{ old('username') }}" required autofocus>
        @if ($errors->has('username'))
            <span class="help-block">
                <strong>{{ $errors->first('username') }}</strong>
            </span>
        @endif
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
        <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="{{ old('email') }}" required>
        @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
        @endif
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" id="password_confirmation" name="password_confirmation" required>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">
            Register
        </button>
      </div>
    </form>
  </div>
</div>
@endsection
