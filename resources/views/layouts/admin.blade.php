<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>SMmap Home | @yield('page-title')</title>
    <link rel="stylesheet" href="{{ asset('css/home/style.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>

    @yield('header')
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                    <a class="navbar-brand brand-logo" href="{{ route('home') }}">SMmap</a>
                    <a class="navbar-brand brand-logo-mini" href="{{ route('home') }}">SM</a>
                </div>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile">
                        <span class="nav-profile-name">Welcome {{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-dark btn-sm ml-2">Sign Out</button>
                        </form>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">:::
                </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('index') }}" target="_blank">
                            <span><i class="fas fa-globe text-primary"></i> See Site</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('home') ? 'bg-warning' : '' }}">
                        <a class="nav-link" href="{{ route('home') }}">
                            <span><i class="fas fa-tachometer-alt text-primary"></i> Home</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('home/marks/edit') ? 'bg-warning' : '' }}">
                        <a class="nav-link" href="{{ route('home.marks.edit') }}">
                            <span><i class="fas fa-map-marker-alt text-primary"></i> Marks</span>
                        </a>
                    </li>
                    <li class="nav-item {{ request()->is('home/color-range/edit') ? 'bg-warning' : '' }}">
                        <a class="nav-link" href="{{ route('home.color-range.edit') }}">
                            <span><i class="fas fa-map text-primary"></i> Color Range</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="main-panel">
                <div class="content-wrapper">
                    @if (session('success'))
                        <div class="alert alert-success rounded-0">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @yield('content')
                </div>
                <p class="text-center mt-3">
                    <a href="https://en.wikipedia.org/wiki/Open_source" target="_blank">♥ Open Source</a>
                    <a href="https://github.com/samadha56/smmap" target="_blank"> | GitHub</a>
                </p>
            </div>
        </div>
    </div>

    @yield('footer')
    <script src="{{ asset('js/home/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('js/home/off-canvas.js') }}"></script>

</body>

</html>
