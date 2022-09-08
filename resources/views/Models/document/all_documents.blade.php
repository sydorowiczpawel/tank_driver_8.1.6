@extends('layouts.app')

@section('content')
<div class="container">
	<a href="add_document">
    <button class="btn btn-warning btn-sm">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
      </svg>
    </button>
  </a>
  <table class="table table-striped table-hover">
    <thead>
    <tr>
      <th>Nazwa</th>
      <th>Numer</th>
      <th>Właściciel</th>
      <th>Wygasa</th>
      <th>Pozostało</th>
      <th></th>
    </tr>
  </thead>
    @foreach($documents as $doc)
    <?php
      $today = new DateTime(date("Y-m-d"));
      $appt  = new DateTime($doc -> end_date);
      $days = $appt->diff($today)->days;
      ?>
    <tr>
      <td>{{ $doc -> name }}</td>
      <td>{{ $doc -> number}}</td>
      <td>{{ $doc -> pass_number}}</td>
      <td>{{ $doc -> end_date}}</td>
			@if($today > $appt)
			<td>wygasł</td>
      @else
      <td>{{ $days}} dni</td>
      @endif
      <td>
        @endforeach
      </td>
    </tr>
  </table>
  <a href="add_document">
    <button class="btn btn-warning btn-sm">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
      </svg>
    </button>
  </a>
</div>
</div>
@endsection