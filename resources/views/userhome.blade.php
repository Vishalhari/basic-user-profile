@extends('layouts.master')

@section('content')

 <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1 class="mt-5">User Home</h1>

        <h2>Welcome <span>{{ $userdata->username   }}</span></h2>
        
        
      </div>
    </div>
  </div>
@endsection