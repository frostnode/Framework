<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Frostnode CMS</title>
    <link href="{{ asset('core/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700" rel="stylesheet">
</head>
<body>

    <div id="app">
        <section class="hero is-primary has-background is-fullheight">
            @include('core::partials.message')
            <div class="hero-body">
                <div class="container">
                    @yield('content')
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('core/js/app.js') }}"></script>
</body>
</html>
