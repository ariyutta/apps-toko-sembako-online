@extends('layouts.main')

@section('title')
    <div class="page-title d-flex justify-content-end">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item active">{{ $title_admin }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ $title_admin }}</h4>
@endsection

@section('content')
    <div class="row mt-3">
        <div class="col-sm-3">
            <div class="card-box shadow">
                <h4>Jumlah Pengguna</h4>
                <hr>
                <div class="row">
                    <div class="col-8 mt-1">
                        <i class="fas fa-users fa-3x"></i>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-end">
                            <h1>{{ $jml_pengguna }}</h1>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <h5>Item</h5>
                </div>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="card-box shadow">
                <h4>Jumlah Pemasok</h4>
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
        </div>

        <div class="col-sm-3">
            <div class="card-box shadow">
                <h4>Jumlah Kategori</h4>
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
        </div>

        <div class="col-sm-3">
            <div class="card-box shadow">
                <h4>Jumlah Barang</h4>
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
        </div>

        <div class="col-sm-3">
            <div class="card-box shadow">
                <h4>Jumlah Pesanan</h4>
                <hr>
                <div class="row">
                    <div class="col-8 mt-1">
                        <i class="fas fa-window-restore fa-3x"></i>
                    </div>
                    <div class="col-4">
                        <div class="d-flex justify-content-end">
                            <h1>0</h1>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <h5>Item</h5>
                </div>
            </div>
        </div>

    </div>
@endsection