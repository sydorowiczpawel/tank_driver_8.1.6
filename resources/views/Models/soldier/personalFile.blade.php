@extends('layouts.app')
@section('content')

<div class="container">
  @if(Auth::user()->pass_number !== NULL )
  <div>
{{-- Tabela z rozkazami wyjazdu --}}
  <table class="table table-sm">
    {{-- nagłówek --}}
    <thead class="table-dark">
      <tr>
        <th>Niezakończone rozkazy wyjazdu</th>
        <th></th>
        <th></th>
      </tr>
    </thead>
    <thead class="table-dark">
      <tr>
        <th>nr. rozkazu</th>
        <th>pojazd</th>
        <th></th>
      </tr>
    </thead>
    @foreach($dep_orders as $order)
    @if($order -> odometer_end === NULL)
    <tbody>
      <tr>
        <td>{{ $order -> series }}</td>
        <td>{{ $order -> tank_number }}</td>
        @if($order -> goh_end === NULL)
        <td>
          <button class="btn btn-warning btn-sm">
            <a href="/edit_departure_order/{{ $order -> id }}">
              {{-- <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-pencil-square" viewBox="0 0 16 16"><path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/><path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/></svg> --}}
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-exclamation-lg" viewBox="0 0 16 16"><path d="M7.005 3.1a1 1 0 1 1 1.99 0l-.388 6.35a.61.61 0 0 1-1.214 0L7.005 3.1ZM7 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0Z"/></svg>
            </a>
          </button>
        </td>
        @else
        <td>{{ $order -> odometer_end}}</td>
        <td>{{ $order -> goh_end}}</td>
        <td>{{ $order -> wh_end}}</td>
        <td>
          {{-- Zobacz szczegóły --}}
        <button class="btn btn-warning btn-sm">
          <a href="/departure_order_details/{{ $order -> id }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
          </a>
        </button>
        </td>
        @endif
      </tr>
    </tbody>
    @endif
    @endforeach
  </table>
  @else
  <table class="table table-sm">
    <thead class="table-dark">
      <tr>
        <th style="text-align: center">Twoje konto nie zostało jeszcze zweryfikowane przez administratora. Daj mu chwilę, jest zarobiony ;)</th>
      </tr>
    </thead>
  </table>
</div>
  @endif
</div>
@endsection