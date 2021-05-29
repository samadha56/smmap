<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SMmap | @yield('page-title')</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    @yield('header')
</head>

<body>
    <div class="container">
        <nav class="navbar navbar navbar-dark bg-primary navbar-expand-lg container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01"
                aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand" href="{{ route('index') }}">SMmap</a>
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/marks') }}">Marks</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/color-range') }}">Color Range</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/login') }}">Login</a>
                    </li>
                </ul>
            </div>
        </nav>
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>

</html>
