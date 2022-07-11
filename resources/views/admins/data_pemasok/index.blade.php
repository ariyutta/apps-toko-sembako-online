@extends('layouts.main')

@section('title')
    <div class="d-flex justify-content-between">
        <h4 class="mt-2">{{ $title_admin }}</h4>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url(''.Auth::user()->role_user->role->name.'') }}">Dashboard</a></li>
            <li class="breadcrumb-item active">{{ $title_admin }}</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box shadow">
                {{-- <h4>Data Pemasok</h4> --}}
                {{-- <hr> --}}
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahPemasok">
                            Tambah Data
                          </button>
                        <div class="table-responsive mt-3">
                            <table id="datatable" class="table table-bordered table-striped nowrap table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pemasok</th>
                                        <th>Alamat</th>
                                        <th>No. Telepon</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_pemasok as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_pemasok }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->no_telp }}</td>
                                            <td class="text-center">
                                                <a href="{{ url(''.Auth::user()->role_user->role->name.'/data_pemasok/ubah_data', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="hapus_data_pemasok({{ $item->id }})"><i class="fas fa-trash"></i></button>
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
<div class="modal fade" id="tambahPemasok" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pemasok</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url(''.Auth::user()->role_user->role->name.'/data_pemasok/tambah_data') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukkan Nama Barang">
                  </div>
                <div class="form-group">
                  <label for="nama_pemasok">Nama Pemasok</label>
                  <input type="text" class="form-control" id="nama_pemasok" name="nama_pemasok" placeholder="Masukkan Nama Pemasok">
                </div>
                <div class="form-group">
                  <label for="no_telp">Nomor Telepon</label>
                  <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="Masukkan Nomor Telepon">
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <textarea class="form-control" id="alamat" name="alamat" rows="3" placeholder="Masukkan Alamat"></textarea>
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
