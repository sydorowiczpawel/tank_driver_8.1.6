@extends('layouts.app')

@section('content')
<div class="container">
  @if(Auth::user() -> pass_number === "AA001")
	<form method="POST" action="/admin_departure_order_store">
  @else
  <form method="POST" action="/departure_order_store/{{ Auth::user()->pass_number}}">
		@csrf
  @endif

{{-- Pass number if ADMIN --}}
    @if((Auth::user() -> pass_number) === "AA001")
		<div class="form-group row">
			<label for="pass_number" class="col-md-4 col-form-label text-md-right">{{ __('Pass number') }}</label>
			<div class="col-md-6">
				<select id="pass_number" name="pass_number" type="text" class="form-control" >
					@foreach ($soldier as $object)
					<option>{{ $object -> pass_number }}</option>
					@endforeach
				</select>
      </div>
		</div>
    @else

    {{-- Pass number if USER --}}
    <div class="form-group row">
      <label for="pass_number" class="col-md-4 col-form-label text-md-right">{{ __('Pass number') }}</label>
      <div class="col-md-6">
        <label for="pass_number" class="col-md-4 col-form-label text-md-right">{{Auth::user() -> pass_number}}</label>
      </div>
    </div>
    @endif

{{-- Tank number --}}
		<div class="form-group row">
			<label for="tank_number" class="col-md-4 col-form-label text-md-right">{{ __('Tank number') }}</label>
			<div class="col-md-6">
				<select id="tank_number" name="tank_number" type="text" class="form-control" placeholder="wybierz czomk">
					@foreach ($tank as $object)
					<option>{{ $object -> tank_number }}</option>
					@endforeach
				</select>
    </div>
		</div>

<!-- Order series -->
		<div class="form-group row">
			<label for="series" class="col-md-4 col-form-label text-md-right">{{ __('Seria i numer rozkazu') }}</label>
			<div class="col-md-6">
        <input id="series" type="text" class="form-control @error('series') is-invalid @enderror" name="series">
				@error('series')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
			</div>
    </div>

<!-- Order start_date -->
		<div class="form-group row">
			<label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Data rozpoczęcia') }}</label>
      <div class="col-md-6">
        <input id="start_date" type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date" placeholder="YYYY-MM-DD">
        @error('start_date')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>
    </div>

<!-- Order end_date -->
    <div class="form-group row">
      <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('Data wygaśnięcia') }}</label>
      <div class="col-md-6">
        <input id="end_date" type="text" class="form-control @error('end_date') is-invalid @enderror" name="end_date" placeholder="YYYY-MM-DD">
				@error('end_date')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>
    </div>

<!-- Order km_start-->
		<div class="form-group row">
			<label for="odometer_start" class="col-md-4 col-form-label text-md-right">{{ __('Początkowy licznik kilometrów') }}</label>
      <div class="col-md-6">
        <input id="odometer_start" type="text" class="form-control @error('km_start') is-invalid @enderror" name="odometer_start" value="0000.00">
        @error('km_start')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>
    </div>

<!-- Order general operating hours start-->
    <div class="form-group row">
      <label for="goh_start" class="col-md-4 col-form-label text-md-right">{{ __('General operating hours') }}</label>
      <div class="col-md-6">
        <input id="goh_start" type="text" class="form-control @error('goh_start') is-invalid @enderror" name="goh_start" value="0000.00">
        @error('goh_start')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>
    </div>

<!-- Order work hours start-->
    <div class="form-group row">
      <label for="wh_start" class="col-md-4 col-form-label text-md-right">{{ __('Working hours') }}</label>
      <div class="col-md-6">
        <input id="wh_start" type="text" class="form-control @error('wh_start') is-invalid @enderror" name="wh_start" value="0000.00">
        @error('wh_start')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>
    </div>

<!-- Register Button -->
  <div>
    <button type="submit" class="btn btn-success btn-sm">{{ __('Dodaj') }}</button>
    </form>
	</div>
</div>
@endsection