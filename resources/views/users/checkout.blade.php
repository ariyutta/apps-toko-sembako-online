@extends('layouts.main_user')

@section('title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Rekomendasi</a></li>
            <li class="breadcrumb-item"><a href="{{ url('dashboard/keranjang') }}">Keranjang</a></li>
            <li class="breadcrumb-item active">{{ $title_user }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ $title_user }}</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box shadow">
                <form class="container">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="provinsi">Provinsi</label>
                        <select id="provinsi" name="provinsi" class="form-control">
                            <option value="">-- Pilih Provinsi --</option>
                            <option value="kalbar">Kalimantan Barat</option>
                            <option value="jakarta">DKI Jakarta</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="kota">Kota</label>
                        <select id="kota" name="kota" class="form-control">
                            <option value="">-- Pilih Kota --</option>
                            <option value="ptk">Pontianak</option>
                            <option value="jkt">Jakarta</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="no_telp">Nomor Telepon</label>
                      <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Telepon">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="pesan">Pesan</label>
                        <textarea class="form-control" id="pesan" name="pesan" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="jenis_pengiriman">Jenis Pengiriman</label>
                        <select id="jenis_pengiriman" name="jenis_pengiriman" class="form-control">
                            <option value="">-- Pilih Jenis Pengiriman --</option>
                            <option value="jne">JNE</option>
                            <option value="jnt">JNT Express</option>
                        </select>
                      </div>

                    <div class="form-group">
                        <div class="form-group row-md-6">
                            <fieldset disabled="disabled">
                                <div class="form-group row mt-2">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Total</label>
                                    <div class="col-sm-3">
                                      <input type="text" class="form-control" id="inputEmail3" value="Rp. 30.000">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Ongkos Kirim</label>
                                    <div class="col-sm-3">
                                      <input type="text" class="form-control" id="inputEmail3" value="Rp. 30.000">
                                    </div>
                                  </div>
                                  <div class="form-group row mt-2">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Total Harga</label>
                                    <div class="col-sm-3">
                                      <input type="text" class="form-control" id="inputEmail3" value="Rp. 30.000">
                                    </div>
                                  </div>
                            </fieldset>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-center">
                      <button style="font-weight: bold" type="button" onclick="confirm_pembayaran()" class="btn btn-success mr-2">Lanjutkan Pembayaran</button>
                        <a style="font-weight: bold" href="{{ url('dashboard/keranjang') }}" class="btn btn-secondary">Batalkan</a>
                    </div>
                  </form>
            </div>
        </div>
    </div>
@endsection