@extends('layouts.main_user')

@section('title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('home/status_pesanan') }}">Status Pesanan</a></li>
            <li class="breadcrumb-item"><a href="{{ url('home/status_pesanan/detail/'.$data_pesanan->id) }}">Detail Pesanan</a></li>
            <li class="breadcrumb-item active">{{ $title_user }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ $title_user }}</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box shadow">
                <form action="{{ url('home/submit_pembayaran/'.$data_pesanan->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <fieldset disabled="disabled">
                        <div class="form-group row">
                            <label for="jumlah_total" class="col-sm-3 col-form-label">Total Harga Bayar</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="jumlah_total" name="jumlah_total" value="{{ 'Rp. '.number_format($data_pesanan->jumlah_total , 0, ",", "."); }}">
                            </div>
                          </div>
                    </fieldset>
                    <div class="form-group row">
                        <label class="col-sm-3 form-label" for="jenis_pembayaran_id">Jenis Pembayaran</label>
                        <div class="col-sm-9">
                            <select class="form-control" id="jenis_pembayaran_id" name="jenis_pembayaran_id">
                                <option value="">-- Pilih Jenis Pembayaran --</option>
                                @foreach ($data_payment as $item)
                                  <option value="{{ $item->id }}">{{ $item->nama_payment }} - {{ $item->no_payment }}</option>
                                @endforeach
                              </select>
                        </div>
                      </div>
                    <div class="form-group row">
                        <label for="bukti_pembayaran" class="col-sm-3 form-label">Unggah Bukti Pembayaran</label>
                        <div class="col-sm-4">
                            <input type="file" class="dropify" id="bukti_pembayaran" name="bukti_pembayaran" data-height="150" required/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tombol" class="col-sm-3 form-label"></label>
                        <div class="col-sm-9">
                            <button type="submit" class="btn btn-success mr-1" style="font-weight: bold">Kirim</button>
                            <a href="{{ url('home/status_pesanan/detail/'.$data_pesanan->id) }}" class="btn btn-secondary" style="font-weight: bold">Batalkan</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection