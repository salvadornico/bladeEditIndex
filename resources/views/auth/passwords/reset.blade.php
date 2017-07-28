@extends('layouts.template', ['title' => 'Reset your password'])

@section('main_content')

	<div class="container">
		<div class="row">
			<div class="col m8 offset-m2">

			<div class="panel-heading">Reset Password</div>

				<form method="POST" action="{{ route('password.request') }}">
					{{ csrf_field() }}

					<input type="hidden" name="token" value="{{ $token }}">

					<div class="input-field">
						<label for="email">E-Mail Address</label>
						<input id="email" type="email" name="email" value="{{ $email or old('email') }}" required>

						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif
					</div>

					<div class="input-field">
						<label for="password">Password</label>
						<input id="password" type="password" name="password" required>

						@if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
					</div>

					<div class="input-field">
						<label for="password-confirm">Confirm Password</label>
						<input id="password-confirm" type="password" name="password_confirmation" required>

						@if ($errors->has('password_confirmation'))
							<span class="help-block">
								<strong>{{ $errors->first('password_confirmation') }}</strong>
							</span>
						@endif
					</div>

					<button type="submit" class="btn amber darken-1">
						Reset Password
					</button>

				</form>

			</div>
		</div>
	</div>

@endsection
