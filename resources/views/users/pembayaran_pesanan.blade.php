@extends('layouts.main_user')

@section('title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Rekomendasi</a></li>
            <li class="breadcrumb-item"><a href="{{ url('dashboard/keranjang') }}">Keranjang</a></li>
            <li class="breadcrumb-item"><a href="{{ url('dashboard/checkout') }}">Checkout Pesanan</a></li>
            <li class="breadcrumb-item active">{{ $title_user }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ $title_user }}</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box shadow">
                <form action="">
                    <fieldset disabled="disabled">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Total Harga Bayar</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputEmail3" value="Rp. 120.000">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="inputPassword3" class="col-sm-3 col-form-label">Nomor Rekening Pembayaran</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="inputPassword3" value="4235634856283">
                            </div>
                          </div>
                    </fieldset>
                    <div class="form-group row">
                        <label for="image" class="col-sm-3 form-label">Unggah Bukti Pembayaran</label>
                        <div class="col-sm-4">
                            <input type="file" class="dropify" id="image" name="image" data-height="150" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tombol" class="col-sm-3 form-label"></label>
                        <div class="col-sm-9">
                            <button button="submit" onclick="submit_pembayaran()" class="btn btn-success" style="font-weight: bold">Kirim</button>
                            <a href="{{ url('dashboard/checkout') }}" class="btn btn-secondary" style="font-weight: bold">Batalkan</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection