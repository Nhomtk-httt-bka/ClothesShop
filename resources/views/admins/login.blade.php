@extends('layouts.auth_admin')
@section('content')
  <div class="card card-login mx-auto mt-5">
    <div class="card-header">Login Admin</div>
    <div class="card-body">
      <form>
        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
            <label for="inputEmail">Email address</label>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
            <label for="inputPassword">Password</label>
          </div>
        </div>
        <div class="form-group">
          <div class="checkbox">
            <label>
              <input type="checkbox" value="remember-me">
              Remember Password
            </label>
          </div>
        </div>
        <a class="btn btn-primary btn-block" href="{{ url('admin/dashboard') }}">Login</a>
      </form>
      <div class="text-center">
        <a class="d-block small mt-3" href="{{ url('admin/register') }}">Register an Account</a>
        <a class="d-block small" href="{{ url('admin/forgotPass') }}">Forgot Password?</a>
      </div>
    </div>
  </div>
@endsection