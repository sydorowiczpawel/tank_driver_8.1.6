@extends('layouts.app')

@section('content')
<div class="container">
  <form method="POST" action="/finish_order/{{$dep_order->id}}">
  @csrf

<!-- Odometer_start-->
    <div class="form-group row">
      <label for="odometer_start" class="col-md-4 col-form-label text-md-right">{{ __('Licznik kilometrów przed wyjazdem') }}</label>
      <div class="col-md-6">
        <label for="odometer_start" class="col-md-4 col-form-label text-md-right">{{$dep_order -> odometer_start}}</label>
      </div>
    </div>

<!-- Odometer_end-->
    <div class="form-group row">
      <label for="odometer_end" class="col-md-4 col-form-label text-md-right">{{ __('Licznik kilometrów po użyciu') }}</label>
      <div class="col-md-6">
        <input id="odometer_end" type="text" class="form-control @error('odometer_end') is-invalid @enderror" name="odometer_end">
        @error('odometer_end')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>
    </div>

<!-- General hours start-->
    <div class="form-group row">
      <label for="goh_start" class="col-md-4 col-form-label text-md-right">{{ __('Licznik motogodzin ogólnych przed wyjazdem') }}</label>
      <div class="col-md-6">
        <label for="goh_start" class="col-md-4 col-form-label text-md-right">{{$dep_order -> goh_start}}</label>
      </div>
    </div>

<!-- General hours end-->
    <div class="form-group row">
      <label for="goh_end" class="col-md-4 col-form-label text-md-right">{{ __('Licznik motogodzin ogólnych po użyciu') }}</label>
      <div class="col-md-6">
        <input id="goh_end" type="text" class="form-control @error('goh_end') is-invalid @enderror" name="goh_end" placeholder="0000.00">
        @error('goh_end')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>
    </div>

<!-- Working hours start-->
    <div class="form-group row">
      <label for="wh_start" class="col-md-4 col-form-label text-md-right">{{ __('Licznik motogodzin obciążonych przed wyjazdem') }}</label>
      <div class="col-md-6">
        <label for="wh_start" class="col-md-4 col-form-label text-md-right">{{$dep_order -> wh_start}}</label>
      </div>
    </div>

<!-- Working hours end-->
    <div class="form-group row">
      <label for="wh_end" class="col-md-4 col-form-label text-md-right">{{ __('Końcowy licznik motogodzin obciążonych') }}</label>
      <div class="col-md-6">
        <input id="wh_end" type="text" class="form-control @error('wh_end') is-invalid @enderror" name="wh_end" placeholder="0000.00">
        @error('wh_end')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>
    </div>

<!-- Type heater_min-->
    <div class="form-group row">
      <label for="heater" class="col-md-4 col-form-label text-md-right">{{ __('Czas pracy podgrzewacza') }}</label>
      <div class="col-md-6">
        <input id="heater" type="text" class="form-control @error('heater') is-invalid @enderror" name="heater" placeholder="czas pracy podaj w minutach">
        @error('heater')
          <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
        @enderror
      </div>
    </div>

<!-- Type 7,62mm_ammo-->
                        <div class="form-group row">
                            <label for="pkt" class="col-md-4 col-form-label text-md-right">{{ __('PKT ammo') }}</label>
                            <div class="col-md-6">
                                <input id="pkt" type="text" class="form-control @error('pkt') is-invalid @enderror" name="pkt" placeholder="podaj liczbę wystrzelonych pocisków">
                                @error('pkt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<!-- Type 12,7mm_ammo-->
                        <div class="form-group row">
                            <label for="nswt" class="col-md-4 col-form-label text-md-right">{{ __('NSWT ammo') }}</label>
                            <div class="col-md-6">
                                <input id="nswt" type="text" class="form-control @error('nswt') is-invalid @enderror" name="nswt" placeholder="podaj liczbę wystrzelonych pocisków">

                                @error('nswt')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<!-- Type 125mm_ammo-->
                        <div class="form-group row">
                            <label for="armata" class="col-md-4 col-form-label text-md-right">{{ __('125mm_ammo') }}</label>

                            <div class="col-md-6">
                                <input id="armata" type="text" class="form-control @error('armata') is-invalid @enderror" name="armata" placeholder="podaj liczbę wystrzelonych pocisków">

                                @error('armata')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<!-- Register Button -->
                    </div>
                            <div>
                                <button type="submit" class="btn btn-success">{{ __('Dodaj') }}</button>
                    </form>
                                <a href="/allDepartureOrders/{{ Auth::user() -> pass_number }}"><button class="btn btn-primary">{{ __('Powrót') }}</button></a>
                            </div>
                </div>
<div class="card">
@endsection