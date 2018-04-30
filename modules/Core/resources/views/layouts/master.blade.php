<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Frostnode CMS</title>

    <!-- Laravel Mix - CSS File -->
    <link href="{{ mix('css/app.css','modules/core') }}" rel="stylesheet">

    <!-- Stylesheets - CSS Files -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700" rel="stylesheet">
</head>
<body>

    <div id="app">
        @include('core::partials.hero')
        <section class="section">
            <div class="container is-fluid">
                @include('core::partials.message')
                @yield('content')
            </div>
        </section>

    </div>

    <!-- Laravel Mix - JS File -->
    <script src="{{ mix('js/app.js', 'modules/core') }}"></script>
</body>
</html>
