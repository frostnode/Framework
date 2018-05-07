@extends('auth::layouts.master')

@section('content')
    <div class="column is-4 is-offset-4">
        <h3 class="title has-text-white has-text-centered">Forgot password?</h3>
        <p class="subtitle has-text-white has-text-centered">No worries, we got you covered.</p>
        <div class="box">
            <form method="POST" action="{{ route('password.request') }}">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="field">
                    <label for="email" class="label">E-Mail Address</label>
                    <div class="control">
                        <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="email" id="email" name="email" value="{{ $email ?? old('email') }}" required autofocus>
                    </div>
                    @if ($errors->has('email'))
                        <p class="help is-danger">
                            {{ $errors->first('email') }}
                        </p>
                    @endif
                </div>

                <div class="field">
                    <label for="password" class="label">Password</label>
                    <div class="control">
                        <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" id="password" type="password" name="password" required>
                    </div>
                    <p class="help">
                        At least 6 characters, with one character uppercase and one number.
                    </p>
                    @if ($errors->has('password'))
                        <p class="help is-danger">
                            {{ $errors->first('password') }}
                        </p>
                    @else

                    @endif
                </div>

                <div class="field">
                    <label for="password_confirmation" class="label">Confirm password</label>
                    <div class="control">
                        <input class="input {{ $errors->has('password_confirmation') ? 'is-danger' : '' }}" type="password" id="password_confirmation" name="password_confirmation">
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <p class="help is-danger">
                            {{ $errors->first('password_confirmation') }}
                        </p>
                    @endif
                </div>

                <button type="submit" class="button is-block is-info is-large is-fullwidth">
                    <span class="icon">
                        <i class="mdi mdi-send-secure"></i>
                    </span>
                    <span>{{ __('Send password reset link') }}</span>
                </button>
            </form>
        </div>
    </div>
@endsection
