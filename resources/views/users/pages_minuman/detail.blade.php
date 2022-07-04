@extends('layouts.main_user')

@section('title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Rekomendasi</a></li>
            <li class="breadcrumb-item"><a href="{{ url('dashboard/minuman') }}">Minuman</a></li>
            <li class="breadcrumb-item active">{{ $title_user }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ $title_user }}</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box shadow">
                <div class="row">
                    <div class="col-sm-6">
                        <img class="mt-2" src="{{ asset('gambar_barang/'.$data->gambar_barang) }}" alt="default.jpg" width="100%">
                    </div>
                    <div class="col-sm-6">
                        <h2>{{ $data->nama_barang }}</h2>
                        <h3 style="color: rgb(0, 231, 0)">{{ 'Rp. '.number_format($data->harga_jual , 0, ",", "."); }}</h3>
                        <fieldset disabled="disabled">
                            <textarea class="form-control mt-1 mb-3" id="deskripsi_barang" name="deskripsi_barang" rows="5">{{ $data->keterangan }}</textarea>
                        </fieldset>
                        <form action="#" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="id_pengaduan" value="#">
                            <fieldset disabled="disabled">
                                <div class="form-group row">
                                    <label for="stok_tersedia" class="col-sm-3 col-form-label">Stok Tersedia</label>
                                    <div class="col-sm-2">
                                    <input type="disabled" class="form-control" id="stok_tersedia" name="stok_tersedia" value="{{ $data->stok }}">
                                    </div>
                                </div>
                            </fieldset>
                            <div class="form-group row">
                                <label for="tambah_pesanan" class="col-sm-3 col-form-label">Tambah Pesanan</label>
                                <div class="col-sm-3">
                                <input type="number" class="form-control" id="tambah_pesanan" name="tambah_pesanan" placeholder="0 - 999">
                                </div>
                            </div>
                            <fieldset disabled="disabled">
                                <div class="form-group row">
                                    <label for="terjual" class="col-sm-3 col-form-label">Terjual</label>
                                    <div class="col-sm-2">
                                    <input type="disabled" class="form-control" id="terjual" name="terjual" value="20">
                                    </div>
                                </div>
                            </fieldset>
                            <hr>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-purple mr-2"> <span style="font-weight: bold">Masukkan Keranjang</span> </button>  
                                <a href="#" class="btn btn-success  mr-2"> <span style="font-weight: bold">Beli Sekarang</span> </a>
                                <a href="{{ url('dashboard/minuman') }}" class="btn btn-secondary"> <span style="font-weight: bold">Kembali</span> </a>  
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection