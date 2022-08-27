@extends('layouts.app')
@section('content')

<div class="container">
{{-- tabela z dokumentami --}}
	<table class="table table-sm">
    <thead class="table-dark">
      <tr>
        @foreach($user as $object)
        <th>{{ $object -> rank }} {{ $object -> firstName }} {{ $object -> lastName }} </th>
        @endforeach
        <th>przepustka nr. {{ $object -> pass_number }} </th>
        <th>
          <?php
          echo date("l ") . date("d-m-Y");
          ?>
          </th>
			</tr>
    </thead>
    <tbody>
			@foreach($docs as $doc)

      <?php
      $e_date = $doc -> end_date;
      $today = new DateTime(date("d-m-Y"));
      $appt  = new DateTime($e_date);
      $days = $appt->diff($today)->days;
      ?>

      <tr>
        <td>{{$doc -> name }}</td>
        <td>ważne do {{$doc -> end_date}}</td>

        @if($appt >= $today)
        <td>upływa za {{$days}} dni</td>
        @else
        <td>upłynął {{$days}} dni temu</td>
        @endif

        @endforeach
			</tr>
    </tbody>
  </table>
  {{-- Tabela z czołgami --}}
  <table class="table table-sm">
    <thead class="table-dark">
      <tr>
        <th>nr. pojazdu</th>
        <th>licznik km</th>
        <th>mtgOG</th>
        <th>mtgOBC</th>
        <th>OO-1</th>
        <th>OO-2</th>
        <th>wymiana oleju</th>
      </tr>
    </thead>
    @foreach($tanks as $tank)
    <tbody>
      <tr>
        <td>{{ $tank->tank_number }}</td>
        <td>km</td>
        <td>OG</td>
        <td>OBC</td>
        <td>OO-1</td>
        <td>OO-2</td>
        <td>olej</td>
      </tr>
    </tbody>
    @endforeach
  </table>

  {{-- Tabela z rozkazami wyjazdu --}}
  <table class="table table-sm">
    <thead class="table-dark">
      <tr>
        <th>nr. rozkazu</th>
        <th>pojazd</th>
        <th>data rozpoczęcia</th>
        <th>data zakończenia</th>
        <th>kilometry</th>
        <th>mtg og</th>
        <th>mtg obc</th>
        <th></th>
      </tr>
    </thead>
    @foreach($eos as $eo)
    <tbody>
      <tr>
        <td>{{ $eo -> series }}</td>
        <td>{{ $eo -> tank_number }}</td>
        <td>{{ $eo -> start_date }}</td>
        <td>{{ $eo -> end_date }}</td>
        @if($eo -> geh_end === NULL)
        <td></td>
        <td></td>
        <td></td>
        <td>
          <button class="btn btn-warning btn-sm">
            <a href="/editexitorder/{{ $eo -> id }}">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg>
            </a>
          </button>
        </td>
        @else
        <td>{{ $eo -> km_counter_end}}</td>
        <td>{{ $eo -> geh_end}}</td>
        <td>{{ $eo -> leh_end}}</td>
        <td>
          {{-- Zobacz szczegóły --}}
        <button class="btn btn-warning btn-sm">
          <a href="/eodetails/{{ $eo -> id }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
          </a>
        </button>
        </td>
        @endif
      </tr>
    </tbody>
    @endforeach
  </table>
</div>
@endsection