@extends('layouts.template', ['title' => 'Login'])

@section('main_content')

    <div class="container">
        <div class="row section">
            <div class="col m8 offset-m2">

                <div class="row section">
                    <h5>Log in to your account</h5>                    
                </div>

                <form method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class=" input-field">
                        <label for="email">Email Address</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>

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

                    <div class="row section">
                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label for="remember" id="remember-label">Remember Me</label>                        
                    </div>

                    <div class="row section">
                        <button type="submit" class="btn amber darken-1">
                            Login
                        </button>

                        <a class="btn-flat grey-text" href="{{ route('password.request') }}" id="forgot-link">
                            Forgot Your Password?
                        </a>
                    </div>
                </form>

        </div>
    </div>

@endsection
