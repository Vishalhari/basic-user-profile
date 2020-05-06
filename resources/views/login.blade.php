
@extends('layouts.master')

@section('content')
<style type="text/css">
#error {
    color: red;
}
</style>
<div class="container">
  <h2>User Login</h2>


  <form  method="post" action="{{ URL::to('login') }}">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="email">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter Username" name="username" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
    </div>
    
  
    <input type="submit" id="register" value="Login" class="btn btn-primary" name="login">
    
  </form>
</div>

@endsection