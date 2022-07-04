@extends('layouts.main')

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

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box shadow">
                <h4>Data Barang</h4>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahBarang">
                            Tambah Data
                          </button>
                        <div class="table-responsive mt-3">
                            <table id="datatable" class="table table-striped nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Kategori</th>
                                        <th>Harga Jual</th>
                                        <th>Harga Beli</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_barang as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                              <img src="{{ asset('gambar_barang/'. $item->gambar_barang) }}" alt="" height="100px">
                                            </td>
                                            <td>{{ $item->kode_barang }}</td>
                                            <td>{{ $item->nama_barang }}</td>
                                            <td>{{ $item->stok }}</td>
                                            <td>{{ $item->kategori->nama_kategori }}</td>
                                            <td>{{ 'Rp.'.number_format($item->harga_jual , 0, ",", "."); }}</td>
                                            <td>{{ 'Rp.'.number_format($item->harga_beli , 0, ",", "."); }}</td>
                                            <td class="text-center">
                                                <a href="{{ url('dashboard/admins/data_barang/ubah_data', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="hapus_data_barang({{ $item->id }})"><i class="fas fa-trash"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data  -->
<div class="modal fade" id="tambahBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalScrollableTitle">Tambah Data Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('dashboard/admins/data_barang/tambah_data') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" class="form-control" id="kode_barang" name="kode_barang" placeholder="Masukkan Kode Barang">
                      </div>
                    <div class="form-group col-sm-12">
                      <label for="nama_barang">Nama Barang</label>
                      <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang">
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="harga_jual">Harga Jual</label>
                        <input type="number" class="form-control" id="harga_jual" name="harga_jual" placeholder="Masukkan Harga Jual 0 - 999999">
                      </div>
                      <div class="form-group col-sm-6">
                        <label for="harga_beli">Harga Beli</label>
                        <input type="number" class="form-control" id="harga_beli" name="harga_beli" placeholder="Masukkan Harga Beli 0 - 999999">
                      </div>
                      <div class="form-group col-sm-12">
                        <label for="kategori_id" class="col-form-label">Kategori</label>
                        <select id="kategori_id" name="kategori_id" class="form-control form-control-sm" required>
                            <option value="">-- Pilih Kategori --</option>
                            @foreach($kategori as $key => $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-sm-12">
                        <label for="stok">Stok</label>
                        <input type="number" class="form-control" id="stok" name="stok" placeholder="Masukkan Jumlah Stok">
                      </div>
                      <div class="form-group col-sm-12">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3" placeholder="Masukkan Keterangan"></textarea>
                      </div>
                      <div class="form-group col-sm-12">
                        <label for="gambar_barang">Gambar</label>
                        <input type="file" id="gambar_barang" name="gambar_barang" class="dropify" data-height="180" />
                      </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Tambah Data</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </form>
            </div>
        </div>
    </div>
  </div>
@endsection
