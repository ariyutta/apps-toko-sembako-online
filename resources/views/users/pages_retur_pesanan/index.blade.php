@extends('layouts.main_user')

@section('title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('home/status_pesanan') }}">Status Pesanan</a></li>
            <li class="breadcrumb-item active">{{ $title_user }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ $title_user }}</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box shadow">
                <form action="{{ url('home/ajukan_retur_pesanan') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" id="jumlah_total_hide" name="jumlah_total_hide" value="{{ $data_pesanan->jumlah_total }}" />
                    <input type="hidden" id="pesanan_id_hide" name="pesanan_id_hide" value="{{ $data_pesanan->id }}" />
                    <input type="hidden" id="user_id_hide" name="user_id_hide" value="{{ $data_pesanan->user_id }}" />
                    <fieldset disabled="disabled">
                        <div class="form-group row">
                            <label for="kode_pesanan" class="col-sm-3 col-form-label">Kode Pesanan</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="kode_pesanan" name="kode_pesanan" value="{{ $data_pesanan->kode_pesanan }}">
                            </div>
                          </div>
                        <div class="form-group row">
                            <label for="jumlah_total" class="col-sm-3 col-form-label">Total Harga Pesanan</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="jumlah_total" name="jumlah_total" value="{{ 'Rp. '.number_format($data_pesanan->jumlah_total , 0, ",", "."); }}">
                            </div>
                          </div>
                    </fieldset>
                    <div class="form-group row">
                        <label for="kondisi" class="col-sm-3 col-form-label">Kondisi</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="kondisi" name="kondisi">
                                <option value="">-- Pilih Kondisi Barang --</option>
                                <option value="rusak">Rusak</option>
                                <option value="lecet">Lecet</option>
                                <option value="robek">Robek</option>
                                <option value="pecah">Pecah</option>
                                <option value="lainnya">Lainnya</option>
                              </select>
                        </div>
                      </div>
                    <div class="form-group row">
                        <label for="bukti_barang" class="col-sm-3 col-form-label">Unggah Kondisi Barang</label>
                        <div class="col-sm-4">
                            <input type="file" class="dropify" id="bukti_barang" name="bukti_barang" data-height="150" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tombol" class="col-sm-3 form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-danger mr-1" style="font-weight: bold">Ajukan Retur Pesanan</button>
                            <a href="{{ url('home/status_pesanan') }}" class="btn btn-secondary" style="font-weight: bold">Batalkan</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection