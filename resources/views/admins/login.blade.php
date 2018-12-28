@extends('layouts.auth_admin')
@section('content')
  <div class="card card-login mx-auto mt-5">
    <div class="card-header">Login Admin</div>
    <div class="card-body">
      @if($errors->any())
        <div class="alert alert-danger alert-block">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <strong>{{$errors->first()}}</strong>
        </div>
      @endif
      <form action="{{ url('admin/login') }}" method="post">
        @csrf
        <div class="form-group">
          <div class="form-label-group">
            <input name="email" type="email" id="inputEmail" class="form-control" placeholder="Email address" required="required" autofocus="autofocus">
            <label for="inputEmail">Email address</label>
          </div>
        </div>
        <div class="form-group">
          <div class="form-label-group">
            <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
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
        <button type="submit" class="btn btn-primary btn-block">Login</button>
      </form>
      <div class="text-center">
        <a class="d-block small mt-3" href="{{ url('admins/create') }}">Register an Account</a>
        <a class="d-block small" href="">Forgot Password?</a>
      </div>
    </div>
  </div>
@endsection