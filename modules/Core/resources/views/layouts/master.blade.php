<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Frostnode CMS</title>
    <link href="{{ asset('core/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
</head>
<body>

    <div class="columns is-gapless is-multiline is-fullheight">
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

    <script src="{{ asset('core/js/app.js') }}"></script>
</body>
</html>
