<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>User Profile</title>

  <!-- Bootstrap core CSS -->
  <link href="{{ asset('Assets/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
    <div class="container">
      <a class="navbar-brand" href="#">User Profile</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          @if(Auth::guest())
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/Register') }}">Registration</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/login') }}">Login</a>  
          </li>
          @else
          <li class="nav-item">
            <a class="nav-link" href="{{ url('/profile') }}">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" 
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
          </form>
          @endif
          
          
          
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  @yield('content')


  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('Assets/jquery/jquery.slim.min.js') }}"></script>
  <script src="{{ asset('Assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>