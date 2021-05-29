@extends('layouts.admin')
@section('page-title', 'Dashboard')
@section('content')
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <strong>{{ Auth::user()->name }} / Welcome to SMmap Dashboard</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="card">
        <div class="card-header">
            Maps
        </div>
        <div class="card-body">
            <h5 class="card-title">Here You Can Edit Maps!</h5>
            <a href="{{ route('home.marks.edit') }}" class="btn btn-primary"><i class="fas fa-map-marker-alt"></i> Marks Map</a>
            <a href="{{ route('home.color-range.edit') }}" class="btn btn-primary"><i class="fas fa-map"></i> Color Range Map</a>
        </div>
    </div>
@endsection
