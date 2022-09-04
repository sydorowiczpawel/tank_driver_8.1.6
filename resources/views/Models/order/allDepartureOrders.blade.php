@extends('layouts.app')
@section('content')

<div class="container">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">{{  Auth::user() -> pass_number }}</a>
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
      <li class="nav-item">
        <a class="nav-link disabled" href="/allDepartureOrders/{{Auth::user()->pass_number}}">Departure orders</a>
      </li>
    </ul>
  </div>
</nav>

@if(Auth::user()->pass_number !== NULL )
	<table class="table table-striped table-sm">
    <tr>
			<th>Pojazd</th>
      <th>Seria/Numer</th>
      <th>km - po użyciu</th>
      <th>mtg OG - po użyciu</th>
      <th>mtg OBC - po użyciu</th>
      <th></th>
    </tr>
  @foreach($dep_orders as $dep_order)
    <tr>
      <td>{{ $dep_order -> tank_number }}</td>
      <td>{{ $dep_order -> series }}</td>
      <td>{{ $dep_order -> odometer_end }}</td>
      <td>{{ $dep_order -> goh_end }}</td>
      <td>{{ $dep_order -> wh_end }}</td>
      <td>
        {{-- Zakończ rozkaz wyjazdu --}}
				@if($dep_order -> wh_end === NULL)
					<a href="/edit_departure_order/{{$dep_order->id}}">
            <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="tooltip" data-bs-placement="right" title="Tooltip on right">
              {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg> --}}
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-exclamation-lg" viewBox="0 0 16 16"><path d="M7.005 3.1a1 1 0 1 1 1.99 0l-.388 6.35a.61.61 0 0 1-1.214 0L7.005 3.1ZM7 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"/></svg>
            </button>
          </a>
				@else
        {{-- Zobacz szczegóły --}}
				<a href="/departure_order_details/{{$dep_order->id}}">
          <button class="btn btn-warning btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
          </button>
        </a>
				@endif
			</td>
      @endforeach
    </tr>
    {{-- Nowy rozkaz wyjazdu --}}
    <tr>
      <td>
        <a href="/addDepartureOrder/{{ Auth::user() -> pass_number}}">
          <button class="btn btn-warning btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-plus" viewBox="0 0 16 16"><path d="M8 6.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V11a.5.5 0 0 1-1 0V9.5H6a.5.5 0 0 1 0-1h1.5V7a.5.5 0 0 1 .5-.5z"/><path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zm-3 0A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4.5h-2z"/></svg>
          </button>
        </a>
      </td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </table>
  @else
  <table class="table table-sm">
    <thead class="table-dark">
      <tr>
        <th style="text-align: center">Twoje konto nie zostało jeszcze zweryfikowane przez administratora. Daj mu chwilę, jest zarobiony ;)</th>
      </tr>
    </thead>
  </table>
  @endif
</div>
@endsection