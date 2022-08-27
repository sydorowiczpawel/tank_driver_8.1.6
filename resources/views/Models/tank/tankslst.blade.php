@extends('layouts.app')

@section('content')
<div class="container">
  @if((Auth::user()->pass_number) === "AA001")
  <div>
    <a href="all_soldiers"><button class="btn btn-outline-warning btn-sm" type="button">Soldiers</button></a>
    <a href="all_tanks"><button class="btn btn-warning btn-sm">Tanks</button></a>
    <a href="all_documents"><button class="btn btn-outline-warning btn-sm">Documents</button></a>
    <a href="addUser">
      <button class="btn btn-warning btn-sm">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/><path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/></svg>
      </button>
    </a>
  </div>
  @endif
	<table class="table table-striped table-sm">
    <tr>
      <th>Model</th>
      <th>Numer</th>
      <th>Opcje</th>
    </tr>

		@foreach($tanks as $tank)
		<tr>
      <td id="tank_model">{{$tank -> model }}</td>
      <td id="tank_number">{{$tank -> tank_number }}</td>
      <td>
        {{-- Zobacz szczegóły --}}
        <button class="btn btn-warning btn-sm">
          <a href="showTank/{{ $tank -> tank_number }}">
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
    </tr>
		@endforeach
	</table>
</div>
@endsection