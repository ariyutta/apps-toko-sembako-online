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
                <form action="{{ url('dashboard/submit_checkout') }}" method="POST" class="container">
                  {{ csrf_field() }}
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="provinsi">Provinsi</label>
                        <select id="provinsi" name="provinsi" class="form-control" required>
                            <option value="*">-- Pilih Provinsi --</option>
                            @foreach ($provinsi as $item)
                              <option value="{{ $item->id }}">{{ $item->nama_wilayah }}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="kota">Kota</label>
                        <select id="kota" name="kota" class="form-control" required>
                            <option value="*">-- Pilih Kota --</option>
                            @foreach ($kota as $item)
                              <option value="{{ $item->id }}">{{ $item->nama_wilayah }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="no_telp">Nomor Telepon</label>
                      <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Telepon" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat Lengkap</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="pesan">Pesan</label>
                        <textarea class="form-control" id="pesan" name="pesan" rows="5" required></textarea>
                    </div>

                    <div class="form-group">
                        <label for="jenis_pengiriman">Jenis Pengiriman</label>
                        <select id="jenis_pengiriman" name="jenis_pengiriman" class="form-control" required>
                            <option value="">-- Pilih Jenis Pengiriman --</option>
                            <option value="jne">JNE</option>
                            <option value="jnt">JNT Express</option>
                        </select>
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
                            <fieldset disabled="disabled">
                                <div class="form-group row mt-2">
                                    <label for="total" class="col-sm-2 col-form-label">Total</label>
                                    <div class="col-sm-3">
                                      <input type="text" class="form-control" id="total" name="total" value="{{ 'Rp. '.number_format($total , 0, ",", "."); }}">
                                    </div>
                                  </div>
                                  <div class="form-group row">
                                    <label for="ongkos_kirim" class="col-sm-2 col-form-label">Ongkos Kirim</label>
                                    <div class="col-sm-3">
                                      <input type="text" class="form-control" id="ongkos_kirim" name="ongkos_kirim" value="{{ 'Rp. '.number_format($ongkos_kirim , 0, ",", "."); }}">
                                    </div>
                                  </div>
                                  <div class="form-group row mt-2">
                                    <label for="total_harga" class="col-sm-2 col-form-label">Total Harga</label>
                                    <div class="col-sm-3">
                                      <input type="text" class="form-control" id="total_harga" name="total_harga" value="{{ 'Rp. '.number_format($total_all , 0, ",", "."); }}">
                                    </div>
                                  </div>
                            </fieldset>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-center">
                      <button style="font-weight: bold" type="submit" class="btn btn-success mr-2">Selesai</button>
                        <a style="font-weight: bold" href="{{ url('dashboard/keranjang') }}" class="btn btn-secondary">Batalkan</a>
                    </div>
                  </form>
            </div>
        </div>
    </div>
@endsection