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
                {{-- <h4>Laporan Persediaan</h4>
                <hr> --}}
                <div class="row">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahPayment">
                            Tambah Data
                          </button>
                        <div class="table-responsive mt-3">
                            <table id="datatable" class="table table-striped table-bordered nowrap table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Payment</th>
                                        <th>Nomor Payment</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_payment as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama_payment }}</td>
                                            <td>{{ $item->no_payment }}</td>
                                            <td class="text-center">
                                                <a href="{{ url(''.Auth::user()->role_user->role->name.'/data_payment/ubah_data', $item->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="hapus_data_payment({{ $item->id }})"><i class="fas fa-trash"></i></button>
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
<div class="modal fade" id="tambahPayment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Payment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url(''.Auth::user()->role_user->role->name.'/data_payment/tambah_data') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                  <label for="nama_payment">Nama Payment</label>
                  <input type="text" class="form-control" id="nama_payment" name="nama_payment" placeholder="Masukkan Nama Payment">
                </div>
                <div class="form-group">
                    <label for="no_payment">Nomor Payment</label>
                    <input type="text" class="form-control" id="no_payment" name="no_payment" placeholder="Masukkan Nomor Payment">
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
