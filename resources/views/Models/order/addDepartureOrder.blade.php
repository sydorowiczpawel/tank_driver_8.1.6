@extends('layouts.app')

@section('content')
<div class="container">
	<form method="POST" action="/exitorderstore/{{ Auth::user()->pass_number}}">
		@csrf
		<div class="form-group row">
			<label for="tank_number" class="col-md-4 col-form-label text-md-right">{{ __('Tank number') }}</label>
			<div class="col-md-6">
				<select id="tank_number" name="tank_number" type="text" class="form-control" >
					@foreach ($tanks as $tank)
					<option>{{ $tank -> tank_number }}</option>
					@endforeach
				</select>
    </div>
		</div>
		<!-- Type series -->
		<div class="form-group row">
			<label for="series" class="col-md-4 col-form-label text-md-right">{{ __('Seria i numer rozkazu') }}</label>
			<div class="col-md-6">
        <input id="series" type="text" class="form-control @error('series') is-invalid @enderror" name="series">
				@error('series')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
			</div>
    </div>
		<!-- Type start_date -->
		<div class="form-group row">
			<label for="start_date" class="col-md-4 col-form-label text-md-right">{{ __('Data rozpoczęcia') }}</label>
      <div class="col-md-6">
        <input id="start_date" type="text" class="form-control @error('start_date') is-invalid @enderror" name="start_date" value="YYYY-MM-DD">
        @error('start_date')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>
    </div>
		<!-- Type end_date -->
    <div class="form-group row">
      <label for="end_date" class="col-md-4 col-form-label text-md-right">{{ __('Data wygaśnięcia') }}</label>
      <div class="col-md-6">
        <input id="end_date" type="text" class="form-control @error('end_date') is-invalid @enderror" name="end_date" value="YYYY-MM-DD">
				@error('end_date')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>
    </div>
		<!-- Type km_start-->
		<div class="form-group row">
			<label for="km_start" class="col-md-4 col-form-label text-md-right">{{ __('Początkowy licznik kilometrów') }}</label>
      <div class="col-md-6">
        <input id="km_start" type="text" class="form-control @error('km_start') is-invalid @enderror" name="km_start" value="0000.00">
        @error('km_start')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>
    </div>
		<!-- Type geh_start-->
    <div class="form-group row">
      <label for="geh_start" class="col-md-4 col-form-label text-md-right">{{ __('Początkowy licznik motogodzin ogólnych') }}</label>
      <div class="col-md-6">
        <input id="geh_start" type="text" class="form-control @error('geh_start') is-invalid @enderror" name="geh_start" value="0000.00">
        @error('geh_start')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>
    </div>
		<!-- Type leh_start-->
    <div class="form-group row">
      <label for="leh_start" class="col-md-4 col-form-label text-md-right">{{ __('Początkowy licznik motogodzin obciążonych') }}</label>
      <div class="col-md-6">
        <input id="leh_start" type="text" class="form-control @error('leh_start') is-invalid @enderror" name="leh_start" value="0000.00">
        @error('leh_start')
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