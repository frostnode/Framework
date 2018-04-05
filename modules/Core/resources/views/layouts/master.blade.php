<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Frostnode CMS</title>
    <link href="{{ mix('css/app.css','modules/core') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700" rel="stylesheet">
</head>
<body>

    <div id="app" class="columns is-gapless is-multiline is-fullheight">
        <div class="column is-12">
            @include('core::partials.navbar')
        </div>

        @section('sidebar')
        <div class="column is-2 is-sidebar">
            @include('core::partials.sidebar')
        </div>
        @show

        <div class="column is-content">
            @include('core::partials.message')
            @yield('content')
        </div>
    </div>

    <script src="{{ mix('js/app.js', 'modules/core') }}"></script>
</body>
</html>
