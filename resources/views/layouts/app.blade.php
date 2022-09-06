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
      <nav class="navbar navbar-expand-sm navbar-white bg-white">
        <div class="collapse navbar-collapse " id="navbarSupportedContent">
          <ul class="navbar-nav me-auto order-0 ">
            <li class="nav-item">
              <a aria-current="page"><?php echo date("l ") . date("d-m-Y");?></a>
            </li>
          </ul>
          <div class="mx-auto">
            <a class="navbar-brand">{{ Auth::user() -> rank}} {{ Auth::user() -> firstName}} {{ Auth::user() -> lastName}}</a>
          </div>
          <div class="mx-auto">
            <button class="btn btn-outline-danger" href="/logout" onclick="event.preventDefault()
            document.getElementById('logout-form').submit()">Wyloguj</button>
            <form id="logout-form" action="/logout" method="POST" class="d-none">@csrf</form>
            @if((Auth::user()->pass_number) === "AA001")
              <a href="/admin"><button class="btn btn-warning">Admin</button></a>
            @endif
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
      </nav>

      @if(Auth::user())
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand">{{  Auth::user() -> pass_number }}</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/personalFile/{{Auth::user()->pass_number}}">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/user_documents/{{Auth::user()->pass_number}}">Documents</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/tankslst/{{Auth::user()->pass_number}}">Tanks</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="/allDepartureOrders/{{Auth::user()->pass_number}}">Departure orders</a>
      </li>
    </ul>
  </div>
</nav>
@endif
    </div>
    <main class="py-4">
      @yield('content')
    </main>
  </div>
</body>
</html>