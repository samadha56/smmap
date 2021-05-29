@extends('layouts.app')
@section('page-title', 'Marks Map')
@section('header')
    <link rel="stylesheet" media="all" href="{{ asset('css/jquery-jvectormap-2.0.5.css') }}" />

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('js/jquery-jvectormap-world-mill.js') }}"></script>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-4 mt-3">
            <div class="card text-white bg-primary mb-3 w-100">
                <div class="card-header">Marks</div>
                <div class="card-body">
                    <p class="card-text">Create Mark On Map By Admin</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div id="world-map-markers" style="width: 100%; height: 90vh"></div>
        </div>
    </div>

    <script>
        $(function() {
            $('#world-map-markers').vectorMap({
                map: 'world_mill',
                scaleColors: ['#C8EEFF', '#0071A4'],
                normalizeFunction: 'polynomial',
                hoverOpacity: 0.7,
                hoverColor: false,
                markerStyle: {
                    initial: {
                        fill: '#ff0000',
                        stroke: '#383f47'
                    }
                },
                backgroundColor: '#383f47',
                markers: [
                    @foreach ($marks as $mark) {
                        latLng: ['{{ $mark->lat }}', '{{ $mark->lng }}'],
                        name: '{{ $mark->description }}'
                        },
                    @endforeach
                ]
            });
        });

    </script>
@endsection
