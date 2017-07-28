@extends('layouts.template', ['title' => 'Reset your password'])

@section('main_content')

    <div class="container">
        <div class="row section">
            <div class="col m8 offset-m2">

                <h5>Reset Password</h5>
                <div class="panel-body">

                    <form method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}

                        <div class="input-field">
                            <label for="email">Email Address</label>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>

                        <button type="submit" class="btn amber darken-1">
                            Send Password Reset Link
                        </button>

                    </form>
                </div>

            </div>
        </div>
    </div>

@endsection
