@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box shadow">
                <h4>Data Pesanan</h4>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahKategori">
                            Tambah Data
                          </button>
                        <div class="table-responsive mt-3">
                            <table id="datatable" class="table table-striped nowrap">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Pesanan</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Jenis Pengiriman</th>
                                        <th>Total Harga</th>
                                        <th>Status Pesanan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>KD-001</td>
                                        <td>Arbi Yudatama</td>
                                        <td>JNT Express</td>
                                        <td>Rp. 34.000</td>
                                        <td><span style="font-size: 14px" class="badge badge-warning">Belum diterima</span></td>
                                    </tr>
                                    <tr>
                                        <td>1</td>
                                        <td>KD-001</td>
                                        <td>Arbi Yudatama</td>
                                        <td>JNT Express</td>
                                        <td>Rp. 34.000</td>
                                        <td><span style="font-size: 14px" class="badge badge-warning">Belum diterima</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Tambah Data  -->
<div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('dashboard/admins/data_kategori/tambah_data') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="nama_kategori">Nama Kategori</label>
                  <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" placeholder="Masukkan Nama Kategori">
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