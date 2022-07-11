@extends('layouts.main_user')

@section('title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ $title_user }}</li>
        </ol>
    </div>
    <h4 class="page-title">Rekomendasi</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-body text-center">
                <img class="card-img-top img-fluid" src="{{ asset('assets_us/images/gallery/5.jpg') }}" alt="Card image cap">
                <h4 class="card-title mt-2">Special title treatment</h4>
                <p class="card-text">Rp. 30.000</p>
                <a href="{{ url('home/detail') }}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-body text-center">
                <img class="card-img-top img-fluid" src="{{ asset('assets_us/images/gallery/5.jpg') }}" alt="Card image cap">
                <h4 class="card-title mt-2">Special title treatment</h4>
                <p class="card-text">Rp. 30.000</p>
                <a href="{{ url('home/detail') }}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-body text-center">
                <img class="card-img-top img-fluid" src="{{ asset('assets_us/images/gallery/5.jpg') }}" alt="Card image cap">
                <h4 class="card-title mt-2">Special title treatment</h4>
                <p class="card-text">Rp. 30.000</p>
                <a href="{{ url('home/detail') }}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card card-body text-center">
                <img class="card-img-top img-fluid" src="{{ asset('assets_us/images/gallery/5.jpg') }}" alt="Card image cap">
                <h4 class="card-title mt-2">Special title treatment</h4>
                <p class="card-text">Rp. 30.000</p>
                <a href="{{ url('home/detail') }}" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
@endsection