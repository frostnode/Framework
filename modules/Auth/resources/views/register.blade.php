@extends('auth::layouts.master')

@section('content')
<section class="hero is-primary has-background is-fullheight">
    <div class="hero-body">
        <div class="container">
            <div class="column is-4 is-offset-4">
                <h3 class="title has-text-white has-text-centered">Sign up</h3>
                <p class="subtitle has-text-white has-text-centered">Want access? Make an account</p>
                <div class="box mt-1">
                    <figure class="avatar has-text-centered">
                        <img src="https://placehold.it/128x128">
                    </figure>
                    <form method="POST" action="{{ route('auth.register') }}">
                        @csrf

                        <div class="field">
                            <label for="name" class="label">Name</label>
                            <div class="control">
                                <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" type="text" id="name" name="name" autofocus="" value="{{ old('name') }}">
                            </div>
                            @if ($errors->has('email'))
                                <p class="help is-danger">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                        </div>

                        <div class="field">
                            <label for="email" class="label">E-Mail Address</label>
                            <div class="control">
                                <input class="input {{ $errors->has('email') ? 'is-danger' : '' }}" type="email" id="email" name="email" value="{{ old('email') }}">
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
                                <input class="input {{ $errors->has('password') ? 'is-danger' : '' }}" type="password" name="password">
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
                            <span class="icon is-small">
                                <span class="oi" data-glyph="person"></span>
                            </span>
                            <span>Sign up</span>
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
