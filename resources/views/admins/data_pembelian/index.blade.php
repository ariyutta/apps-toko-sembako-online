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
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Nama Pemasok</th>
                                        <th>Jumlah Pembelian</th>
                                        <th>Tanggal</th>
                                        {{-- <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_pembelian as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                              @if( $item->barang != Null)
                                                {{ $item->barang->kode_barang }}
                                              @endif
                                            </td>
                                            <td>{{ $item->barang->nama_barang }}</td>
                                            <td>{{ $item->pemasok->nama_pemasok }}</td>
                                            <td>{{ $item->jumlah_pembelian }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            {{-- <td class="text-center">
                                                <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm">Hapus</a>
                                            </td> --}}
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
            <form action="{{ url(''.Auth::user()->role_user->role->name.'/data_pembelian/tambah_data') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="barang_id">Nama Barang</label>
                    <select class="form-control" id="barang_id" name="barang_id">
                      <option value="">-- Pilih Barang --</option>
                      @foreach ($data_barang as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_barang }}</option>
                      @endforeach
                    </select>
                  </div>
                <div class="form-group">
                    <label for="pemasok_id">Nama Pemasok</label>
                    <select class="form-control" id="pemasok_id" name="pemasok_id">
                      <option value="">-- Pilih Pemasok --</option>
                      @foreach ($data_pemasok as $item)
                        <option value="{{ $item->id }}">{{ $item->nama_pemasok }}</option>
                      @endforeach
                    </select>
                  </div>
                <div class="form-group">
                  <label for="jumlah_pembelian">Jumlah Pembelian</label>
                  <input type="number" class="form-control form-control-sm" id="jumlah_pembelian" name="jumlah_pembelian">
                </div>
                {{-- <div class="form-group">
                    <label for="kondisi">Kondisi</label>
                    <select class="form-control form-control-sm" id="kondisi" name="kondisi">
                      <option value="">-- Pilih Kondisi --</option>
                      <option value="1">Normal</option>
                      <option value="2">Lecet</option>
                      <option value="3">Rusak</option>
                      <option value="4">Dikembalikan</option>
                      <option value="5">Aman</option>
                      <option value="6">Tidak Ada</option>
                    </select>
                  </div> --}}
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
