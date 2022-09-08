@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
          @foreach($user as $object)
          @if($object -> pass_number === NULL)
            <form method="POST" action="/define_user/{{$object -> id}}">
          @else
            <form method="POST" action="/update_user/{{$object -> id}}">
          @endif
          @endforeach
					@csrf
<!-- Pass Number -->
					<div class="form-group row">
						<label for="pass_number" class="col-md-4 col-form-label text-md-right">{{ __('Pass number') }}</label>
            @foreach($user as $object)
            {{-- UŻYTKOWNIK ZWERYFIKOWANY --}}
            @if($object -> pass_number !== NULL)
						<label for="pass_number" class="col-md-4 col-form-label text-md-right">
              @foreach ($user as $u)
              {{ $u -> pass_number }}
              @endforeach
            </label>
            {{-- UŻYTKOWNIK NIEZWERYFIKOWANY --}}
            @else
              <div class="col-md-6">
                <input id="pass_number" type="text" class="form-control @error('pass_number') is-invalid @enderror" name="pass_number" value="{{ old('pass_number') }}" required autocomplete="pass_number" autofocus>
                  @error('pass_number')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                  @enderror
              </div>
            @endif
            @endforeach
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
									<option>sierż.</option>
									<option>st. sierż.</option>
									<option>mł. chor.</option>
									<option>chor.</option>
									<option>st. chor.</option>
									<option>st. chor. sztab.</option>
									<option>ppor.</option>
									<option>por.</option>
									<option>kpt.</option>
									<option>mjr.</option>
									<option>ppłk.</option>
									<option>płk.</option>
								</select>
							</div>
						</div>
						<!-- Type name -->
						<div class="form-group row">
							<label for="pass_number" class="col-md-4 col-form-label text-md-right">{{ __('First name') }}</label>
							<label for="pass_number" class="col-md-4 col-form-label text-md-right">
                @foreach ($user as $u)
                {{ $u -> firstName }}
                @endforeach</label>
						</div>
						<!-- Type surname -->
						<div class="form-group row">
							<label for="surname" class="col-md-4 col-form-label text-md-right">{{ __('Last name') }}</label>
							<label for="surname" class="col-md-4 col-form-label text-md-right">
                @foreach ($user as $u)
                {{ $u -> lastName }}
                @endforeach</label>
						</div>
						<!-- Type function -->
						<div class="form-group row">
							<label for="function" class="col-md-4 col-form-label text-md-right">{{ __('Function') }}</label>
							<div class="col-md-6">
								<select id="function" type="text" class="form-control" @error('function') is-invalid @enderror" name="function" required autocomplete="function" autofocus>
									<option>-- wybierz z listy --</option>
									<option>dowódca kompanii</option>
									<option>szef kompanii</option>
									<option>technik kompanii</option>
									<option>technik uzbrojenia</option>
									<option>dowódca plutonu</option>
									<option>pomocnik dowódcy plutonu</option>
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
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('e-mail address') }}</label>
							<label for="email" class="col-md-4 col-form-label text-md-right">
                @foreach ($user as $u)
                {{ $u -> email }}
                @endforeach</label>
						</div>
						{{-- <!-- Type Password -->
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
						</div> --}}
						<!-- Register Button -->
						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
							</div>
						</div>
          </form>
        </div>
      </div>
		</div>
  </div>
</div>
@endsection