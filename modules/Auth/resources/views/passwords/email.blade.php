@extends('auth::layouts.master')

@section('content')
<div class="column is-4 is-offset-4">
    <h3 class="title has-text-white has-text-centered">Forgot password?</h3>
    <p class="subtitle has-text-white has-text-centered">No worries, we got you covered.</p>
    <div class="box">
        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="field">
                <label for="email" class="label">E-Mail Address</label>
                <div class="control">
                    <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="email" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                @if ($errors->has('email'))
                    <p class="help is-danger">
                        {{ $errors->first('email') }}
                    </p>
                @endif
            </div>

            <button type="submit" class="button is-block is-info is-large is-fullwidth">
                <span class="icon is-small">
                    <i class="mdi mdi-18px mdi-send-secure"></i>
                </span>
                <span>Send password reset link</span>
            </button>
        </form>
    </div>
</div>
@endsection
