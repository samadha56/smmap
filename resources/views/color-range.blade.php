@extends('layouts.app')
@section('page-title', 'Color Range Map')
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
                <div class="card-header">Color Range</div>
                <div class="card-body">
                    <p class="card-text">Upload Country Data With Excel File <br>
                        Color Range: #FFFFFF - #4A0000 <br>
                        Excel Example: <a href="/files/excel_template.xlsx" class="text-white">(Download)</a></p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div id="world-map-gdp" style="width: 100%; height: 90vh"></div>
        </div>
    </div>

    <script>
        $(function() {
            $('#world-map-gdp').vectorMap({
                map: 'world_mill',
                series: {
                    regions: [{
                        values: gdpData,
                        scale: ['#ffffff', '#4a0000'],
                        normalizeFunction: 'polynomial'
                    }]
                },
                onRegionTipShow: function(e, el, code) {
                    el.html(el.html() + ' (Value : ' + gdpData[code] + ')');
                }
            });
        });

    </script>
    <script>
        var gdpData = {
            @foreach ($datas as $data)
                '{{ $data->country }}': {{ $data->value }},
            @endforeach
        };

    </script>
@endsection
