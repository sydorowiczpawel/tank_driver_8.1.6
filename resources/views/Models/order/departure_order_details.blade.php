@extends('layouts.app')

@section('content')

<div class="container">
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
        <a class="nav-link" href="/userDocs/{{Auth::user()->pass_number}}">Documents</a>
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

    @foreach($dep_order as $object)

    <?php
    $pkt = '7,62';
    $nswt = '12,7';
    $armata = '125';
    ?>

      <table class="table table-sm">
        <thead class="table-dark">
          <tr>
            <th>Rozkaz wyjazdu nr {{ $object -> series }}</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Kierowca</td>
            <td>{{ Auth::user()-> rank }} {{ Auth::user()-> firstName }} {{ Auth::user()-> lastName }}</td>
          </tr>
          <tr>
            <td>Data ważności</td>
            <td>{{$object -> start_date}} <---> {{$object -> end_date}}</td>
          </tr>
          <tr>
            <td>Licznik kilometrów</td>
            <td>{{$object -> odometer_start }}km -> {{$object -> odometer_end}}km</td>
          </tr>
          <tr>
            <td>Licznik mtgOg</td>
            <td>{{$object -> goh_start}} -> {{$object -> goh_end}}</td>
          </tr>
          <tr>
            <td>Licznik mtgObc</td>
            <td>{{$object -> wh_start}} -> {{$object -> wh_end}}</td>
          </tr>
          <tr>
            <td>Praca podgrzewacza</td>
            <td>{{$object -> heater_min}} min.</td>
          </tr>
          <tr>
            <td>Wystrzelono 7,62 mm</td>
            <td>{{$object -> $pkt}} poc.</td>
          </tr>
          <tr>
            <td>Wystrzelono 12,7 mm</td>
            <td>{{$object -> $nswt}} poc.</td>
          </tr>
          <tr>
            <td>Wystrzelono 125 mm</td>
            <td>{{$object -> $armata }} poc.</td>
          </tr>
        </tbody>
      </table>
  @endforeach

<?php
  $km = round(($object->odometer_end - $object->odometer_start), 1, PHP_ROUND_HALF_UP);
  $mtgog = round(($object -> goh_end - $object -> goh_start), 1, PHP_ROUND_HALF_UP);
  $mtgobc = round(($object -> wh_end - $object -> wh_start), 1, PHP_ROUND_HALF_UP);
  $fuel = round((($km * 3.1) + (($mtgog - $mtgobc) * 19)), 0, PHP_ROUND_HALF_DOWN);
?>

  <table class="table table-sm">
    <thead class="table-dark">
      <tr>
        <th>Podsumowanie</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Przejechano</td>
        <td>{{ $km }} kilometrów</td>
      </tr>
      <tr>
        <td>Przepracowano</td>
        <td>{{ $mtgog }} motogodzin ogólnych</td>
      </tr>
      <tr>
        <td>Przepracowano</td>
        <td>{{ $mtgobc }} motogodzin pod obciążeniem</td>
      </tr>
      <tr>
        <td>Do zatankowania</td>
        <td>{{ $fuel }} litrów</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection