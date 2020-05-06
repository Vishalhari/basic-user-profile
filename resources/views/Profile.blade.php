
@extends('layouts.master')

@section('content')
<style type="text/css">
#error {
    color: red;
}
</style>
<div class="container">
  <h2>User Profile</h2>
  <p id="error"></p>
  
  @if (Session::has('message'))
  <div class="alert alert-success" role="alert">
  {{ Session::get('message') }}
  </div>
  @endif

  <form  method="post" action="{{ URL::to('profile') }}">
    {{ csrf_field() }}
    <div class="form-group">
      <label for="email">Username:</label>
      <input type="text" class="form-control" id="uname" placeholder="Enter Username" name="uname" value="{{ $user->username  }}" readonly>
    </div>
    <div class="form-group">
      <label for="pwd">Email:</label>
      <input type="mail" class="form-control" id="mail" placeholder="Enter mail" name="mail" value="{{ $user->userdetails->mail  }}"  required>
    </div>
    <div class="form-group">
      <label for="pwd">Date Of Birth:</label>
      <input type="date" class="form-control" id="dob" placeholder="Enter dob" name="dob" value="{{ $user->userdetails->dob  }}"  required>
    </div>
    <div class="form-group">
      <label for="pwd">City:</label>
      <input type="text" class="form-control" id="cty" placeholder="Enter city" name="cty" value="{{ $user->userdetails->city  }}" required>
    </div>
  
    <input type="submit" id="register" value="Register" class="btn btn-primary" name="register">
    
  </form>
</div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
@endsection