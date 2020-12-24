<div class="login-wrapper row justify-content-center">
	<div class="col-sm-10 col-md-4">
		<div class="login card">
			<div class="text-center"><h4>{{ __('LOG IND') }}</h4></div>
			<div class="card-body">
				<form method="POST" action="{{ route('login') }}">
					@csrf
					<div class="form-label-group">
						<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="EMAIL ADRESSE" required autocomplete="email" autofocus>
						<label for="email" class="col-form-label text-md-right">{{ __('EMAIL ADRESSE') }}</label>
						@error('email')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					<div class="form-label-group">
						<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="ADGANGSKODE" required autocomplete="current-password">
						<label for="password" class="col-form-label text-md-right">{{ __('ADGANGSKODE') }}</label>
						@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
					</div>
					<div class="form-label-group">
						<div class="form-check">
							<input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
							<label class="form-check-label" for="remember">
								{{ __('Husk mig') }}
							</label>
						</div>
					</div>
					<div class="form-label-group">
						<button type="submit" class="btn btn-primary btn-block">
						{{ __('→') }}
						</button>
					</div>
					<div class="form-label-group">
						@if (Route::has('password.request'))
						<a class="pt-3" href="{{ route('password.request') }}">
							{{ __('Glemt din adgangskode?') }}
						</a>
						@endif
					</div>
				</form>
			</div>
		</div>
	</div>
</div>