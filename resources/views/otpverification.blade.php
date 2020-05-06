
@extends('layouts.master')

@section('content')
<style type="text/css">
#error {
    color: red;
}
</style>
<div class="container">
  <h2>OTP verification</h2>

  @if (Session::has('message'))
  <div class="alert alert-success" role="alert">
  {{ Session::get('message') }}
  </div>
  @endif
  <form  method="post" action="{{ URL::to('verification') }}">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="email">Username:</label>
      <input type="password" class="form-control" id="otp" placeholder="Enter otp" name="otp" required>
      <input type="hidden" name="userid" value="{{  $userotp->userId }}">
    </div>
    
    <input type="submit" id="register" value="otp verification" class="btn btn-primary" name="otpverification">
    
  </form>
</div>

@endsection