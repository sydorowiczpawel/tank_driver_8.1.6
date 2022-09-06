@extends('layouts.app')

@section('content')
<div class="container">
	<div>
    <a href="/all_soldiers">
      <button class="btn btn-warning btn-sm" type="button">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-return-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M14.5 1.5a.5.5 0 0 1 .5.5v4.8a2.5 2.5 0 0 1-2.5 2.5H2.707l3.347 3.346a.5.5 0 0 1-.708.708l-4.2-4.2a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 8.3H12.5A1.5 1.5 0 0 0 14 6.8V2a.5.5 0 0 1 .5-.5z"/></svg>
      </button>
    </a>
    {{-- <a href="/all_tanks"><button class="btn btn-outline-warning btn-sm">Tanks</button></a> --}}
    {{-- <a href="/all_documents"><button class="btn btn-outline-warning btn-sm">Documents</button></a> --}}
    {{-- <a href="/adddoc">
			<button class="btn btn-warning btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16"><path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/></svg></button>
    </a> --}}
  </div>

  <table class="table table-striped table-hover">
    <tr>
      <th>DOKUMENTY</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    <tr>
      <th>Nazwa</th>
      <th>Numer</th>
      <th>Ważny do</th>
      <th>Pozostało</th>
      <th></th>
    </tr>
    @foreach($documents as $doc)

    <?php
      $today = new DateTime(date("Y-m-d"));
      $appt  = new DateTime($doc -> end_date);
      $days = $appt->diff($today)->days;
      ?>
    <tr>
      <td>{{ $doc -> name }}</td>
      <td>{{ $doc -> number}}</td>
      <td>{{ $doc -> end_date}}</td>
			@if($today > $appt)
			<td>wygasł</td>
      @else
      <td>{{ $days}} dni</td>
      @endif
      <td>
        {{-- Zobacz szczegóły --}}
        {{-- <button class="btn btn-warning btn-sm"> --}}
          {{-- <a href="personalFile/{{ $object -> pass_number }}"> --}}
            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg> --}}
          {{-- </a> --}}
        {{-- </button> --}}

        {{-- Edytuj --}}
        {{-- <button class="btn btn-warning btn-sm"> --}}
          {{-- <a href="editSoldier/{{ $object -> id }}"> --}}
            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-pencil-fill" viewBox="0 0 16 16"><path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/></svg> --}}
          {{-- </a> --}}
        {{-- </button> --}}

        {{-- Usuń --}}
        {{-- <button class="btn btn-warning btn-sm"> --}}
          {{-- <a href="delete/{{ $object -> pass_number }}"> --}}
            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash" viewBox="0 0 16 16"><path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/><path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/></svg> --}}
          {{-- </a> --}}
        {{-- </button> --}}
      </td>
    </tr>
    @endforeach
    {{-- dodaj nowego żołnierza --}}
    {{-- <tr>
      <td></td>
      <td></td>
      <td></td>
      <td> --}}
        {{-- Dodaj --}}
        {{-- <a href="addTank">
          <button class="btn btn-warning btn-sm">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/></svg>
          </button>
        </a> --}}
      </td>
    </tr>
  </table>

  <table class="table table-striped table-hover">
    <tr>
      <th>POJAZDY</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    <tr>
      <th>Model</th>
      <th>Numer</th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    @foreach($tanks as $tank)
    <tr>
      <td>{{ $tank -> model }}</td>
      <td>{{ $tank -> tank_number}}</td>
      <td></td>
      <td></td>
      <td>
        {{-- Zobacz szczegóły --}}
        <button class="btn btn-warning btn-sm">
          <a href="/show_tank/{{ $tank -> tank_number }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
          </a>
        </button>
      </td>
    </tr>
    @endforeach
      </td>
    </tr>
  </table>

  <table class="table table-striped table-hover">
    <tr>
      <th>ROZKAZY WYJAZDU</th>
      <th></th>
      <th></th>
      <th></th>
      <th></th>
    </tr>
    <tr>
      <th>Pojazd</th>
      <th>Seria</th>
      <th></th>
      <th>Stany końcowe</th>
      <th></th>
    </tr>
    @foreach($dep_orders as $object)
    <tr>
      <td>{{ $object -> tank_number }}</td>
      <td>{{ $object -> series}}</td>
      <td>{{ $object -> odometer_end}}</td>
      <td>{{ $object -> goh_end}}</td>
      <td>{{ $object -> wh_end}}</td>
      <td>
        {{-- Zobacz szczegóły --}}
        <button class="btn btn-warning btn-sm">
          <a href="/departure_order_details/{{ $object -> id }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
          </a>
        </button>
      </td>
    </tr>
    @endforeach
      </td>
    </tr>
  </table>
</div>
</div>
@endsection