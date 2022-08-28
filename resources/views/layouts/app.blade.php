<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>TanksApplication</title>

	<!-- Scripts -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>

<!-- Styles -->
<style>
  .box_01
  {
    /* position: absolute;  */
    width: 700px;
    height: 500px;
    left: 333px;
    top: 134px;
    background: #161C28;
  }

  .box_02
  {
    /* position: absolute; */
    width: 695px;
    height: 495px;
    left: 335px;
    top: 136px;
  }

</style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>
<body>
  <div id="app">
    <div class="container">
      <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
<!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">

<!-- Authentication Links -->
            @guest
            @if (Route::has('login'))
              <li class="nav-item">
                {{-- <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a> --}}
              </li>
            @endif
						@if (Route::has('register'))
              <li class="nav-item">
                {{-- <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a> --}}
              </li>
            @endif
						@else
              <li>
                <button class="btn btn-outline-danger" href="/logout" onclick="event.preventDefault()
                document.getElementById('logout-form').submit()">Wyloguj
                </button>
                <form id="logout-form" action="/logout" method="POST" class="d-none">
                  @csrf
                </form>
                <a href="/personalFile/{{Auth::user()->pass_number}}"><button class="btn btn-light">Teczka personalna</button></a>
                <a href="/userDocs/{{Auth::user()->pass_number}}"><button class="btn btn-light">Dokumenty</button></a>
                <a href="/allDepartureOrders/{{Auth::user()->pass_number}}"><button class="btn btn-light">Rozkazy wyjazdu</button></a>
                <a href="/tankslst/{{Auth::user()->pass_number}}"><button class="btn btn-light">Czołgi</button></a>
                @if((Auth::user()->pass_number) === "AA001")
                  <a href="/admin"><button class="btn btn-warning">Admin</button></a>
                @endif
              </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
	</div>
  <main class="py-4">
    @yield('content')
  </main>
</div>
</body>
</html>