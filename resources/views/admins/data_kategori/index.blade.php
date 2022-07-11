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
                {{-- <h4>Data Kategori</h4>
                <hr> --}}
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahKategori">
                            Tambah Data
                          </button>
                        <div class="table-responsive mt-3">
                            <table id="datatable" class="table table-bordered table-striped nowrap table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Kategori</th>
                                        <th>Nama Kategori</th>
                                        <th>URL Links</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_kategori as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode_kategori }}</td>
                                            <td>{{ $item->nama_kategori }}</td>
                                            <td>{{ $item->url_link }}</td>
                                            <td class="text-center">
                                                <a href="{{ url(''.Auth::user()->role_user->role->name.'/data_kategori/ubah_data', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="hapus_data_kategori({{ $item->id }})"><i class="fas fa-trash"></i></button>
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
            <form action="{{ url(''.Auth::user()->role_user->role->name.'/data_kategori/tambah_data') }}" method="POST">
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
