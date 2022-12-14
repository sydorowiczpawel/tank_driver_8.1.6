@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                    <div class="card-body">
                        <form class="form group form-sm" method="POST" action="{{ route('register') }}">
                            @csrf

<!-- Type pass number -->
                        <div class="form-group row">
                            <label for="pass_number" class="col-md-4 col-form-label text-md-right">{{ __('Pass number') }}</label>
                            <div class="col-md-6">
                                <input id="pass_number" type="text" class="form-control @error('pass_number') is-invalid @enderror" name="pass_number" value="{{ old('pass_number') }}" required autocomplete="pass_number" autofocus>
                                @error('pass_number')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

<!-- Type rank -->
                        <div class="form-group row">
                            <label for="rank" class="col-md-4 col-form-label text-md-right">{{ __('Rank') }}</label>
							<div class="col-md-6">
                                <select id="rank" type="text" class="form-control" @error('rank') is-invalid @enderror" name="rank" required autocomplete="rank" autofocus>
                                    <option>-- wybierz z listy --</option>
                                    <option>szer.</option>
                                    <option>st. szer.</option>
                                    <option>kpr.</option>
                                    <option>st. kpr.</option>
                                    <option>plut.</option>
                                    <option>st. plut.</option>
                                    <option>sier??.</option>
                                    <option>st. sier??.</option>
                                    <option>m??. chor.</option>
                                    <option>chor.</option>
                                    <option>st. chor.</option>
                                    <option>st. chor. sztab.</option>
                                    <option>ppor.</option>
                                    <option>por.</option>
                                    <option>kpt.</option>
                                    <option>mjr.</option>
                                    <option>pp??k.</option>
                                    <option>p??k.</option>
                                </select>
                            </div>
                        </div>

<!-- Type first name -->
                        <div class="form-group row">
                            <label for="firstName" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                            <div class="col-md-6">
                                <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}" required autocomplete="firstName" autofocus>
                                @error('firstName')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

<!-- Type last name -->
                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}" required autocomplete="lastName" autofocus>
                                @error('lastName')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
                        </div>

<!-- Type function -->
                        <div class="form-group row">
                            <label for="function" class="col-md-4 col-form-label text-md-right">{{ __('Function') }}</label>
							<div class="col-md-6">
                                <select id="function" type="text" class="form-control" @error('function') is-invalid @enderror" name="function" required autocomplete="function" autofocus>
                                    <option>-- wybierz z listy --</option>
                                    <option>dow??dca kompanii</option>
                                    <option>szef kompanii</option>
                                    <option>technik kompanii</option>
                                    <option>technik uzbrojenia</option>
                                    <option>dow??dca plutonu</option>
                                    <option>pomocnik dow??dcy plutonu</option>
                                    <option>kierowca - starszy instruktor</option>
                                    <option>kierowca</option>
                                </select>
                                @error('function')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>
						</div>

              <!-- Type platoon -->
              <div class="form-group row">
                <label for="platoon" class="col-md-4 col-form-label text-md-right">{{ __('Platoon') }}</label>
                <div class="col-md-6">
                  <select id="platoon" type="text" class="form-control" @error('platoon') is-invalid @enderror" name="platoon" value="{{ old('platoon') }}" required autocomplete="platoon" autofocus>
                    <option>-- wybierz z listy --</option>
                    <option>nie dotyczy</option>
                    <option>I</option>
                    <option>II</option>
                    <option>III</option>
                    <option>IV</option>
                  </select>
                  @error('platoon')
                  <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>
              <!-- Type e-mail -->
              <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                <div class="col-md-6">
                  <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                  @error('email')
                  <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>
              <!-- Type Password -->
              <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <div class="col-md-6">
                  <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                  @error('password')
                  <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>
              <!-- Confirm Password -->
              <div class="form-group row">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                <div class="col-md-6">
                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
              </div>
              <!-- Register Button -->
              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection