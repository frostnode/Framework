@extends('auth::layouts.master')

@section('content')
<section class="hero is-primary has-background is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="column is-4 is-offset-4">
                <h3 class="title has-text-white has-text-centered">Login</h3>
                <p class="subtitle has-text-white has-text-centered">Please login to proceed.</p>
                <div class="box mt-1">
                    <figure class="avatar has-text-centered">
                        <img src="https://placehold.it/128x128">
                    </figure>
                    <form method="POST" action="{{ route('auth.login') }}">
                        @csrf
                        <div class="field">
                            <div class="control">
                                <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="email" name="email" value="{{ old('email') }}" placeholder="Your Email" autofocus="">
                            </div>
                            @if ($errors->has('email'))
                                <p class="help is-danger">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <div class="control">
                                <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" name="password" placeholder="Your Password">
                            </div>
                            @if ($errors->has('password'))
                                <p class="help is-danger">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <input class="is-checkradio" id="rememberCheckbox" type="checkbox" name="remember">
                            <label for="rememberCheckbox">Remember me?</label>
                        </div>

                        <button type="submit" class="button is-block is-info is-large is-fullwidth">
                            <span class="icon is-small">
                                <span class="oi" data-glyph="account-login"></span>
                            </span>
                            <span>Sign in</span>
                        </button>
                    </form>
                </div>
                <p class="has-text-grey has-text-centered">
                    {{-- <a href="../">Sign Up</a> &nbsp;·&nbsp; --}}
                    {{-- <a href="../">Forgot Password</a> &nbsp;·&nbsp; --}}
                    <a href="{{ url('/') }}">Need Help?</a>
                </p>
            </div>
        </div>
    </div>
</section>
@stop
