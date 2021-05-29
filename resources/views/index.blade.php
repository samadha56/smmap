@extends('layouts.app')
@section('page-title', 'Open Source & Free Map Manager')
@section('header')
    <link rel="stylesheet" media="all" href="{{ asset('css/jquery-jvectormap-2.0.5.css') }}" />

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('js/jquery-jvectormap-world-mill.js') }}"></script>
@endsection
@section('content')

    <img src="{{ asset('images/smmap-header.png') }}" class="img-fluid w-100" alt="SMmap | Open Source Map Manager Project">

    <div class="row mt-3">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3 w-100">
                <div class="card-header">Thank You:</div>
                <div class="card-body">
                    <p class="card-text">PHP(Laravel) - MySQL <br> JS - Jquery - JVectoMmap - Bootstrap <br> and Open
                        Source World :)</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card text-white bg-primary mb-3 w-100">
                <div class="card-header">How to Get?</div>
                <div class="card-body">
                    <p class="card-text">
                        <strong>Convert Data to Earth Map</strong> <br>
                        Anyone can download this project for free and open source through GitHub
                        <br> GitHub: <a class="text-white" href="#">SMmap Project</a> |
                        Email: <a class="text-white" href="mailto:samadha56@gmail.com">samadha56@gmail.com</a>
                    </p>
                </div>
            </div>
            <a href="https://en.wikipedia.org/wiki/Open_source" target="_blank">
                <p class="text-center">♥ Open Source</p>
            </a>
        </div>
    </div>
@endsection
