
@extends('layouts.master')

@section('content')
<style type="text/css">
#error {
    color: red;
}
</style>
<div class="container">
  <h2>User Registration</h2>
  <p id="error"></p>
  
  @if (Session::has('message'))
  <div class="alert alert-success" role="alert">
  {{ Session::get('message') }}
  </div>
  @endif

  <form  method="post" action="{{ URL::to('user') }}">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="email">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter Username" name="uname" required>
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
    </div>
    <div class="form-group">
      <label for="pwd">Confirm Password:</label>
      <input type="password" class="form-control" id="cpwd" placeholder="Enter Confirm password" name="cpwd" required>
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="mail" class="form-control" id="mail" placeholder="Enter mail" name="mail" required>
    </div>
    <div class="form-group">
      <label for="pwd">Date Of Birth:</label>
      <input type="date" class="form-control" id="dob" placeholder="Enter dob" name="dob"  required>
    </div>
    <div class="form-group">
      <label for="pwd">City:</label>
      <input type="text" class="form-control" id="cty" placeholder="Enter city" name="cty" required>
    </div>
  
    <input type="submit" id="register" value="Register" class="btn btn-primary" name="register">
    
  </form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
   var pass = $('#pwd').val();
    var cpass = $('#cpwd').val();

  $('#cpwd').change(function(){
    var pass = $('#pwd').val();
    var cpass = $('#cpwd').val();
    
    if (pass  != cpass ) 
    {
       $('#error').html('password is not unique');
       $('#register').prop('disabled', true);
       return false;
    }
    else if(pass  == cpass)
    {
      $('#register').prop('disabled', false);
      $('#error').empty();
      return true;
    }
    
  });
})
</script>
@endsection