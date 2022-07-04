@extends('layouts.main_user')

@section('title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Rekomendasi</a></li>
            <li class="breadcrumb-item active">{{ $title_user }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ $title_user }}</h4>
@endsection

@section('content')
    <div class="row">
        @foreach ($data as $item)
            <div class="col-md-3">
                <div class="card card-body shadow text-center">
                    <img class="card-img-top img-fluid" src="{{ asset('gambar_barang/'. $item->gambar_barang) }}" alt="Card image cap">
                    <h4 class="card-title mt-2">{{ $item->nama_barang }}</h4>
                    <p style="font-size: 16px" class="card-text">{{ 'Rp. '.number_format($item->harga_jual , 0, ",", "."); }}</p>
                    <a href="{{ url('dashboard/bahan_pokok/detail/'. $item->id) }}" class="btn btn-success">Cek Detail</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-1 mb-1">
        {{ $data->links() }}
    </div>
@endsection