@extends('layouts.admin')
@section('page-title', 'Marks Map')
@section('header')
    <link rel="stylesheet" media="all" href="{{ asset('css/jquery-jvectormap-2.0.5.css') }}" />
    <link rel="stylesheet" media="all" href="{{ asset('css/home/map.css') }}" />

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-jvectormap-2.0.5.min.js') }}"></script>
    <script src="{{ asset('js/jquery-jvectormap-world-mill.js') }}"></script>
@endsection
@section('content')
    <div class="w-100 h-75 row">
        <div class="col-md-8">
            <div class="map" id="world-map-markers"></div>
        </div>
        <div class="col-md-4">
            <form action="{{ route('home.marks.update') }}" method="post" id="markers">
                @csrf
                <button type="submit" id="submitMap" class="btn btn-primary w-100 rounded-0 btn-lg">
                    <strong><i class="fas fa-sync"></i> Sync Map</strong>
                </button>
                @foreach ($marks as $key => $mark)
                    <div id="latlng{{ $key }}">
                        <input class="form-control w-100" type="text" name="lat[{{ $key }}]"
                            value="{{ $mark->lat }}">
                        <input class="form-control w-100" type="text" name="lng[{{ $key }}]"
                            value="{{ $mark->lng }}">
                        <input class="form-control w-100" type="text" name="description[{{ $key }}]"
                            value="{{ $mark->description }}">
                        <hr>
                    </div>
                @endforeach
            </form>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(function() {
            var map,
                markerIndex = '{{ count($marks) }}',
                markersCoords = {};

            map = new jvm.Map({
                map: 'world_mill',
                markerStyle: {
                    initial: {
                        fill: 'red'
                    }
                },
                markers: [
                    @foreach ($marks as $mark) {
                        latLng: ['{{ $mark->lat }}', '{{ $mark->lng }}'],
                        name: '{{ $mark->description }}'
                        },
                    @endforeach
                ],
                container: $('#world-map-markers'),
                onMarkerTipShow: function(e, label, code) {
                    map.tip.text(markersCoords[code].tooltip);
                },
                onMarkerClick: function(e, code) {
                    map.removeMarkers([code]);
                    map.tip.hide();
                    $('#latlng' + code).remove();
                }
            });

            map.container.click(function(e) {
                var latLng = map.pointToLatLng(
                    e.pageX - map.container.offset().left,
                    e.pageY - map.container.offset().top,
                );
                targetCls = $(e.target).attr('class');
                var description = prompt("Description:");
                if (description && latLng && (!targetCls || (targetCls && $(e.target).attr('class').indexOf(
                        'jvectormap-marker') === -1))) {
                    markersCoords[markerIndex] = latLng;
                    map.addMarker(markerIndex, {
                        latLng: [latLng.lat, latLng.lng, latLng.tooltip = description]
                    });
                    $('#markers').append(
                        `<div id="latlng${markerIndex}">
                            <input class="form-control w-100" type="text" name="lat[${markerIndex}]" id="lat[${markerIndex}]" value="${latLng.lat}">
                            <input class="form-control w-100" type="text" name="lng[${markerIndex}]" id="lng[${markerIndex}]" value="${latLng.lng}">
                            <input class="form-control w-100" type="text" name="description[${markerIndex}]" id="description[${markerIndex}]" value="${description}">
                            <hr></div>`
                    );
                    markerIndex++;
                }
            });
        });

    </script>
@endsection
