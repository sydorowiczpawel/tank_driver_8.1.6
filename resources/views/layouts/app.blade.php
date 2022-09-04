<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>TanksApplication</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
  <div id="app">
    <div class="container">

      
      @if(Auth::user())
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <div class="collapse navbar-collapse " id="navbarSupportedContent">
            <ul class="navbar-nav me-auto order-0 ">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"><?php echo date("l ") . date("d-m-Y");?></a>
              </li>
            </ul>
            <div class="mx-auto">
              <a class="navbar-brand " href="/personalFile/">{{ Auth::user() -> rank}} {{ Auth::user() -> firstName}} {{ Auth::user() -> lastName}}</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
            <div class="mx-auto">
          <button class="btn btn-outline-danger" href="/logout" onclick="event.preventDefault()
          document.getElementById('logout-form').submit()">Wyloguj</button>
          <form id="logout-form" action="/logout" method="POST" class="d-none">
            @csrf
          </form>
          @if((Auth::user()->pass_number) === "AA001")
          <a href="/admin"><button class="btn btn-warning">Admin</button></a>
          @endif
        </div>
      </div>
    </div>
    @else
    
    <div class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
          </li>
        </ul>
      </div>
    </div>
    @endif
    <main class="py-4">
    </div>
    @yield('content')
    </main>
  </div>
</body>
</html>