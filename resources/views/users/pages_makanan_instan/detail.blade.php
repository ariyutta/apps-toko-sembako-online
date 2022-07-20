@extends('layouts.main_user')

@section('title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('home/makanan_instan') }}">Makanan Instan</a></li>
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
                            <textarea class="form-control form-control-sm mt-1 mb-3" id="deskripsi_barang" name="deskripsi_barang" rows="5">{{ $data->keterangan }}</textarea>
                        </fieldset>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Masukkan Keranjang</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Beli Sekarang</a>
                            </li>
                        </ul>


                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <form action="{{ url('home/tambah_keranjang/'.$data->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <fieldset disabled="disabled">
                                        <div class="form-group row">
                                            <label for="stok_tersedia" class="col-sm-3 col-form-label">Stok Tersedia</label>
                                            <div class="col-sm-2">
                                            <input type="disabled" class="form-control form-control-sm" id="stok_tersedia" name="stok_tersedia" value="{{ $data->stok }}">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group row">
                                        <label for="jumlah_barang" class="col-sm-3 col-form-label">Tambah Pesanan</label>
                                        <div class="col-sm-3">
                                        <input type="number" class="form-control form-control-sm" id="jumlah_barang" name="jumlah_barang" placeholder="0 - 999">
                                        </div>
                                    </div>
                                    <fieldset disabled="disabled">
                                        <div class="form-group row">
                                            <label for="terjual" class="col-sm-3 col-form-label">Terjual</label>
                                            <div class="col-sm-2">
                                            <input type="disabled" class="form-control form-control-sm" id="terjual" name="terjual" value="{{ $data->terjual }}">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <hr>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-purple mr-2"> <span style="font-weight: bold">Masukkan Keranjang</span> </button>  
                                        <a href="{{ url('home/makanan_instan') }}" class="btn btn-secondary"> <span style="font-weight: bold">Kembali</span> </a>  
                                    </div>
                                </form>
                            </div>




                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <form action="{{ url('home/beli_sekarang/checkout/'.$data->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <fieldset disabled="disabled">
                                        <div class="form-group row">
                                            <label for="stok_tersedia" class="col-sm-3 col-form-label">Stok Tersedia</label>
                                            <div class="col-sm-2">
                                            <input type="disabled" class="form-control form-control-sm" id="stok_tersedia" name="stok_tersedia" value="{{ $data->stok }}">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group row">
                                        <label for="jumlah_barang" class="col-sm-3 col-form-label">Tambah Pesanan</label>
                                        <div class="col-sm-3">
                                        <input type="number" class="form-control form-control-sm" id="jumlah_barang" name="jumlah_barang" placeholder="0 - 999">
                                        </div>
                                    </div>
                                    <fieldset disabled="disabled">
                                        <div class="form-group row">
                                            <label for="terjual" class="col-sm-3 col-form-label">Terjual</label>
                                            <div class="col-sm-2">
                                            <input type="disabled" class="form-control form-control-sm" id="terjual" name="terjual" value="{{ $data->terjual }}">
                                            </div>
                                        </div>
                                    </fieldset>
                                    <hr>
                                    <div class="d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success mr-2"> <span style="font-weight: bold">Beli Sekarang</span> </button>
                                        <a href="{{ url('home/makanan_instan') }}" class="btn btn-secondary"> <span style="font-weight: bold">Kembali</span> </a>  
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="container mt-3">
                        <h4>Ulasan Komentar</h4>
                        <div class="card-box">
                            @foreach ($data_ulasan as $item)
                                @if(!empty($data_ulasan))
                                    <div class="row">
                                        <div class="col-sm-1" style="margin-left: -20px">
                                            <img src="{{ asset('gambar_profil/'.$item->user->gambar_profil) }}" alt="user-image" class="rounded-circle mt-2" height="40">
                                        </div>
                                        <div class="col-sm-11" style="margin-left: -20px">
                                            <h5>{{ $item->user->name }} <br><span style="font-weight: 100">{{ $item->created_at }} <br></span>
                                                <br> 
                                                @if($item->rating == Null)
                                                    ☆☆☆☆☆
                                                @elseif($item->rating == 1)
                                                    ★☆☆☆☆
                                                @elseif($item->rating == 2)
                                                    ★★☆☆☆
                                                @elseif($item->rating == 3)
                                                    ★★★☆☆
                                                @elseif($item->rating == 4)
                                                    ★★★★☆
                                                @elseif($item->rating == 5)
                                                    ★★★★★
                                                @endif
                                            </h5>
                                            <p>{{ $item->komentar }}</p>
                                        </div>
                                    </div>
                                @else
                                    Tidak Ada Komentar    
                                @endif
                            @endforeach
                        </div>
                        <div class="d-flex justify-content-center">
                            {{ $data_ulasan->links() }}
                        </div>
                    </div>
                </div>
                <form action="{{ url('home/tambah_ulasan') }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" id="barang_id" name="barang_id" value="{{ $data->id }}" />
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="rating">Rating</label>
                            <select class="form-control" id="rating" name="rating">
                            <option value="">-- Silahkan Pilih Rating --</option>
                            <option value="1">★ 1</option>
                            <option value="2">★ 2</option>
                            <option value="3">★ 3</option>
                            <option value="4">★ 4</option>
                            <option value="5">★ 5</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <label for="komentar">Tulis Komentar</label>
                            <textarea class="form-control" id="komentar" name="komentar" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-success btn-sm">Kirim Komentar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection