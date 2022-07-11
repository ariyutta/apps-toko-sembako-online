@extends('layouts.main')

@section('title')
    <div class="d-flex justify-content-between">
        <h4 class="mt-2">{{ $title_admin }}</h4>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item active">{{ $title_admin }}</li>
        </ol>
    </div>
@endsection

@section('content')
<h3>Total Pembayaran Masuk : {{ 'Rp. '.number_format($jml_pembayaran_masuk , 0, ",", "."); }}</h3>
    <div class="row mt-3">
        <div class="col-sm-3">
            <a href="{{ url(''.Auth::user()->role_user->role->name.'/daftar_pelanggan') }}">
                <div class="card-box shadow">
                    <h4>Total Pelanggan</h4>
                    <hr>
                    <div class="row">
                        <div class="col-8 mt-1">
                            <i class="fas fa-users fa-3x"></i>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-end">
                                <h1>{{ $jml_pelanggan }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <h5>Item</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-3">
            <a href="{{ url(''.Auth::user()->role_user->role->name.'/data_pemasok') }}">
                <div class="card-box shadow">
                    <h4>Total Pemasok</h4>
                    <hr>
                    <div class="row">
                        <div class="col-8 mt-1">
                            <i class="fas fa-truck-loading fa-3x"></i>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-end">
                                <h1>{{ $jml_pemasok }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <h5>Item</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-3">
            <a href="{{ url(''.Auth::user()->role_user->role->name.'/data_kategori') }}">
                <div class="card-box shadow">
                    <h4>Total Kategori</h4>
                    <hr>
                    <div class="row">
                        <div class="col-8 mt-1">
                            <i class="fas fa-tags fa-3x"></i>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-end">
                                <h1>{{ $jml_kategori }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <h5>Item</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-3">
            <a href="{{ url(''.Auth::user()->role_user->role->name.'/data_barang') }}">
                <div class="card-box shadow">
                    <h4>Total Barang</h4>
                    <hr>
                    <div class="row">
                        <div class="col-8 mt-1">
                            <i class="fas fa-th-list fa-3x"></i>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-end">
                                <h1>{{ $jml_barang }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <h5>Item</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-3">
            <a href="{{ url(''.Auth::user()->role_user->role->name.'/data_pesanan') }}">
                <div class="card-box shadow">
                    <h4>Total Pesanan</h4>
                    <hr>
                    <div class="row">
                        <div class="col-8 mt-1">
                            <i class="fas fa-window-restore fa-3x"></i>
                        </div>
                        <div class="col-4">
                            <div class="d-flex justify-content-end">
                                <h1>{{ $jml_pesanan }}</h1>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <h5>Item</h5>
                    </div>
                </div>
            </a>
        </div>

    </div>
@endsection