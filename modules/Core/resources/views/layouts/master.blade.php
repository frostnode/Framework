<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Frostnode CMS') }}</title>
    <link href="{{ asset('core/css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i" rel="stylesheet">
</head>
<body>
    @include('core::partials.navbar')

    <div class="columns">
        @section('sidebar')
            <div class="column is-narrow">
                @include('core::partials.sidebar')
            </div>
        @show

        <div class="column">
            <div class="container">
                <div class="wrapper">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('core/js/app.js') }}"></script>
</body>
</html>
