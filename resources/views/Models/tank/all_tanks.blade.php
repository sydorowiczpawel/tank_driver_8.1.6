@extends('layouts.app')

@section('content')
<div class="container">
	<div>
    <a href="/all_soldiers"><button class="btn btn-outline-warning btn-sm" type="button">Soldiers</button></a>
    <a href="/all_tanks"><button class="btn btn-warning btn-sm">Tanks</button></a>
    <a href="all_documents"><button class="btn btn-outline-warning btn-sm">Documents</button></a>
    <a href="/addTank">
			<button class="btn btn-warning btn-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
        </svg>
    </button>
    </a>
  </div>

  <table class="table table-striped table-hover">
    <tr>
      <th>Typ</th>
      <th>Numer</th>
      <th>Właściciel</th>
      <th></th>
    </tr>
    @foreach($tanks as $tank)

    <tr>
      <td>{{ $tank -> model }}</td>
      <td>{{ $tank -> tank_number}}</td>
      <td>{{ $tank -> pass_number}}</td>
      <td>
        {{-- Zobacz szczegóły --}}
        <button class="btn btn-warning btn-sm">
          <a href="/show_tank/{{ $tank -> tank_number }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-search" viewBox="0 0 16 16"><path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
          </a>
        </button>
				<!-- Lista rozkazów -->
        <button class="btn btn-warning btn-sm">
          <a href="/selTankOrders/{{$tank->tank_number}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-journals" viewBox="0 0 16 16"><path d="M5 0h8a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2 2 2 0 0 1-2 2H3a2 2 0 0 1-2-2h1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V4a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1H1a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v9a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H5a1 1 0 0 0-1 1H3a2 2 0 0 1 2-2z"/><path d="M1 6v-.5a.5.5 0 0 1 1 0V6h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V9h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 2.5v.5H.5a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1H2v-.5a.5.5 0 0 0-1 0z"/></svg>
          </a>
        </button>
				<!-- Lista obsług -->
        {{-- <a href="/deletedoc/{{$tank->tank_number}}"><button class="btn btn-outline-warning btn-sm">Delete??</button></a> --}}
      </td>
    @endforeach
    </tr>
  </table>
</div>
@endsection