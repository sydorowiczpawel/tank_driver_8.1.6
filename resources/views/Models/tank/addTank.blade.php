@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
    <div class="col-md-8">
			<div class="card">
        <div class="card-header">{{ __('Add a tank') }}</div>
				<div class="card-body">
					<form method="POST" action="/tankStore">
						@csrf
<!-- Type tank model -->
						<div class="form-group row">
							<label for="model" class="col-md-4 col-form-label text-md-right">{{ __('Model') }}</label>
							<div class="col-md-6">
								<select id="model" name="model" type="text" class="form-control" >
									<option>T-72</option>
									<option>PT-91 Twardy</option>
									<option>M1A2 Abrams</option>
								</select>
							</div>
            </div>

<!-- Type tank number -->
						<div class="form-group row">
              <label for="tank_number" class="col-md-4 col-form-label text-md-right">{{ __('Number') }}</label>
							<div class="col-md-6">
                <input id="tank_number" type="text" class="form-control @error('tank_number') is-invalid @enderror" name="tank_number" value="{{ old('tank_number') }}" required autocomplete="tank_number" autofocus>
								@error('tank_number')
								<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
              </div>
            </div>

<!-- Type a driver -->
						<div class="form-group row">
              <label for="pass_number" class="col-md-4 col-form-label text-md-right">{{ __('Pass number') }}</label>
							<div class="col-md-6">
                <select id="pass_number" name="pass_number" type="text" class="form-control">
									@foreach($users as $object)
                  <option>{{ $object -> pass_number }}</option>
									@endforeach
								</select>
              </div>
            </div>

<!-- Register Button -->
						<div class="form-group row mb-0">
              <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">{{ __('Add') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection