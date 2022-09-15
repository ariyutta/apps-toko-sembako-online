@extends('layouts.main_user')

@section('css')
  <style>
    .table tr th {
      text-align: center;
      vertical-align: middle;
    }

    .table tr td {
      text-align: center;
      vertical-align: middle;
    }
  </style>
@endsection

@section('title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('home/keranjang') }}">Keranjang</a></li>
            <li class="breadcrumb-item active">{{ $title_user }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ $title_user }}</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box shadow">
              <div class="container">
                <p style="text-align: justify"><span style="color: orange; font-weight:bold">Perhatian!</span><br>Tentukan terlebih dahulu tujuan pengirim serta tujuan penerima agar dapat menentukan jumlah ongkos kirim yang ditentukan.</p>
                <hr style="border: 1px solid rgb(236, 236, 236)">
              </div>
                <form action="{{ url('home/beli_sekarang/check_ongkir') }}" method="POST" enctype="multipart/form-data" class="container">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <input type="hidden" id="b_id_hide" name="b_id_hide" value="{{ $b_id }}" />
                  <input type="hidden" id="b_kode_barang_hide" name="b_kode_barang_hide" value="{{ $b_kode_barang }}" />
                  <input type="hidden" id="b_nama_barang_hide" name="b_nama_barang_hide" value="{{ $b_nama_barang }}" />
                  <input type="hidden" id="b_jumlah_barang_hide" name="b_jumlah_barang_hide" value="{{ $b_jumlah_barang }}" />
                  <input type="hidden" id="b_harga_jual_hide" name="b_harga_jual_hide" value="{{ $b_harga_jual }}" />
                  <input type="hidden" id="b_gambar_barang_hide" name="b_gambar_barang_hide" value="{{ $b_gambar_barang }}" />
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <fieldset disabled="disabled">
                          <label for="origin">Lokasi Pengirim</label>
                          <input class="form-control form-control-sm" value="Sintang (Lokasi Penjualan)" style="background-color: rgb(241, 241, 241)">
                        </fieldset>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="destination">Lokasi Penerima</label>
                        <select id="destination" name="destination" class="form-control form-control-sm" required>
                            <option value="*">-- Pilih Kota --</option>
                            @foreach ($kota as $item)
                              <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="jenis_pengiriman">Jenis Pengiriman</label>
                      <select id="jenis_pengiriman" name="jenis_pengiriman" class="form-control form-control-sm" required>
                          <option value="*">-- Pilih Jenis Pengiriman --</option>
                          <option value="jne">JNE (Default Reguler)</option>
                      </select>
                    </div>
                    <div class="d-flex justify-content-center mt-2 mb-2">
                      <button type="submit" class="btn btn-purple" style="font-weight: bold">Tentukan Ongkos Kirim</button>
                    </div>
                </form>

                <div class="form-group container mt-3">
                  <table class="table table-striped table-bordered table-sm">
                    <thead>
                    <tr>
                      <th>Destinasi</th>
                      <th>Tipe Layanan</th>
                      <th>Tarif</th>
                      <th>Estimasi Pengiriman</th>
                    </tr>
                    </thead>
                    <tbody>
                      <tr>
                        @if(!empty($origin))
                          @if(!empty($destination))
                            <td>{{ $origin }} - {{ $destination }}</td>
                          @endif
                        @endif
                        @if(!empty($layanan))
                          <td>{{ $layanan }}</td>
                        @endif
                        @if(!empty($harga_ongkir))
                          <td>{{ 'Rp. '.number_format($harga_ongkir , 0, ",", "."); }}</td>
                          <td>{{ $estimasi.' Hari' }}</td>
                        @endif
                      </tr>
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
              </div>
              
              @if(!empty($harga_ongkir))
                <form action="{{ url('home/submit_checkout') }}" method="POST" class="container">
                  {{ csrf_field() }}
                    <div class="form-group">
                        <label for="pesan">Pesan</label>
                        <textarea class="form-control form-control-sm" id="pesan" name="pesan" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                      <table id="datatable" class="table table-striped table-sm ">
                        <thead>
                          <tr>
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Nama Barang</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($get_keranjang as $item)
                              <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                  <img src="{{ asset('gambar_barang/'.$item->gambar_barang) }}" alt="default.png" height="100px">
                                </td>
                                <td>{{ $item->barang->nama_barang }}</td>
                                <td>{{ $item->jumlah_barang }}</td>
                                <td>{{ 'Rp. '.number_format($item->barang->harga_jual , 0, ",", "."); }}</td>
                              </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>

                    <div class="form-group">
                        <div class="form-group row-md-6">
                          <input type="hidden" id="total_hide" name="total_hide" value="{{ $total }}">
                          <input type="hidden" id="ongkos_kirim_hide" name="ongkos_kirim_hide" value="{{ $harga_ongkir }}">
                          <input type="hidden" id="total_harga_hide" name="total_harga_hide" value="{{ $total_all }}">
                          <input type="hidden" id="origin_hide" name="origin_hide" value="{{ $origin }}">
                          <input type="hidden" id="destination_hide" name="destination_hide" value="{{ $destination }}">
                          <input type="hidden" id="layanan_hide" name="layanan_hide" value="{{ $layanan }}">
                          <input type="hidden" id="jenis_pengiriman_hide" name="jenis_pengiriman_hide" value="{{ $jenis_pengiriman }}">
                            <fieldset disabled="disabled">
                                <div class="form-group row mt-2">
                                    <label for="total" class="col-sm-2 col-form-label">Jumlah Harga</label>
                                    <div class="col-sm-3">
                                      <input type="text" class="form-control form-control-sm" id="total" name="total" value="{{ 'Rp. '.number_format($total , 0, ",", "."); }}">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="ongkos_kirim" class="col-sm-2 pesancol-form-label">Ongkos Kirim</label>
                                    <div class="col-sm-3">
                                        <input type="text" class="form-control form-control-sm" id="ongkos_kirim" name="ongkos_kirim" value="{{ 'Rp. '.number_format($harga_ongkir , 0, ",", "."); }}">
                                    </div>
                                  </div>
                                  <div class="form-group row mt-2">
                                    <label for="total_harga" class="col-sm-2 col-form-label">Total Harga</label>
                                    <div class="col-sm-3">
                                      <input type="text" class="form-control form-control-sm" id="total_harga" name="total_harga" value="{{ 'Rp. '.number_format($total_all , 0, ",", "."); }}">
                                    </div>
                                  </div>
                            </fieldset>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-center">
                      <button style="font-weight: bold" type="submit" onclick="mulai_pesanan()" class="btn btn-success mr-2">Mulai Pesanan</button>
                        <a style="font-weight: bold" href="{{ url('home/keranjang') }}" class="btn btn-secondary">Batalkan</a>
                    </div>
                  </form>
                @endif
            </div>
        </div>
    </div>
@endsection