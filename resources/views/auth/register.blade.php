@extends('layouts.template', ['title' => 'Register'])

@section('main_content')

    <div class="container">

        <div class="row">
            <div class="col m8 offset-m2">

                    <h5>Register</h5>

                    
                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="input-field">
                            <label for="name">Name</label>
                            <input id="name" type="text" name="name" value="{{ old('name') }}" required>

                            @if ($errors->has('name'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="input-field">
                            <label for="email">Email Address</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required>

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
                        </div>

                        <button type="submit" class="btn amber darken-1">
                            Register
                        </button>
                    </form>

            </div>
        </div>

    </div>

@endsection
