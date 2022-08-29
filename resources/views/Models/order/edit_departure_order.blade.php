@extends('layouts.app')

@section('content')
<div class="container">
    <form method="POST" action="/store_departure_order/{{$dep_order->id}}">
    @csrf
<!-- Type km_start-->
                        <div class="form-group row">
                            <label for="km_end" class="col-md-4 col-form-label text-md-right">{{ __('Licznik kilometrów przed wyjazdem') }}</label>
                            <div class="col-md-6">
                            <label for="km_end" class="col-md-4 col-form-label text-md-right">{{$dep_order -> odometer_start}}</label>
                            </div>
                        </div>
<!-- Type km_counter_end-->
                        <div class="form-group row">
                            <label for="km_end" class="col-md-4 col-form-label text-md-right">{{ __('Licznik kilometrów po użyciu') }}</label>
                            <div class="col-md-6">
                                <input id="km_end" type="text" class="form-control @error('km_end') is-invalid @enderror" name="km_end">
                                @error('km_end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<!-- Type km_start-->
                        <div class="form-group row">
                            <label for="km_end" class="col-md-4 col-form-label text-md-right">{{ __('Licznik motogodzin ogólnych przed wyjazdem') }}</label>
                            <div class="col-md-6">
                            <label for="km_end" class="col-md-4 col-form-label text-md-right">{{$dep_order -> goh_start}}</label>
                            </div>
                        </div>
<!-- Type geh_end-->
                        <div class="form-group row">
                            <label for="geh_end" class="col-md-4 col-form-label text-md-right">{{ __('Licznik motogodzin ogólnych po użyciu') }}</label>
                            <div class="col-md-6">
                                <input id="geh_end" type="text" class="form-control @error('geh_end') is-invalid @enderror" name="geh_end" value="0000,00">
                                @error('geh_end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<!-- Type km_start-->
<div class="form-group row">
                            <label for="km_end" class="col-md-4 col-form-label text-md-right">{{ __('Licznik motogodzin obciążonych przed wyjazdem') }}</label>
                            <div class="col-md-6">
                            <label for="km_end" class="col-md-4 col-form-label text-md-right">{{$dep_order -> leh_start}}</label>
                            </div>
                        </div>
<!-- Type leh_end-->
                        <div class="form-group row">
                            <label for="leh_end" class="col-md-4 col-form-label text-md-right">{{ __('Końcowy licznik motogodzin obciążonych') }}</label>
                            <div class="col-md-6">
                                <input id="leh_end" type="text" class="form-control @error('leh_end') is-invalid @enderror" name="leh_end" value="0000,00">
                                @error('leh_end')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<!-- Type heater_min-->
                        <div class="form-group row">
                            <label for="heater" class="col-md-4 col-form-label text-md-right">{{ __('Czas pracy podgrzewacza') }}</label>
                            <div class="col-md-6">
                                <input id="heater" type="text" class="form-control @error('heater') is-invalid @enderror" name="heater" value="czas pracy podaj w minutach">
                                @error('heater')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
<!-- Type 7,62mm_ammo-->
                        <div class="form-group row">
                            <label for="pkt" class="col-md-4 col-form-label text-md-right">{{ __('PKT ammo') }}</label>
                            <div class="col-md-6">
                                <input id="pkt" type="text" class="form-control @error('pkt') is-invalid @enderror" name="pkt" value="podaj liczbę wystrzelonych pocisków">
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
                                <input id="nswt" type="text" class="form-control @error('nswt') is-invalid @enderror" name="nswt" value="podaj liczbę wystrzelonych pocisków">

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
                                <input id="armata" type="text" class="form-control @error('armata') is-invalid @enderror" name="armata" value="podaj liczbę wystrzelonych pocisków">

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
                                <a href="/exitorderslst"><button class="btn btn-primary">{{ __('Powrót') }}</button></a>
                            </div>
                </div>
<div class="card">
@endsection