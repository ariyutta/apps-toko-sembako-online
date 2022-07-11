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
                        <div class="table-responsive mt-3">
                            <table id="datatable" class="table table-striped table-bordered nowrap table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Detail Barang</th>
                                        <th>Nama Pemasok</th>
                                        <th>Kategori</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_barang as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode_barang }}</td>
                                            <td>{{ $item->nama_barang }}</td>
                                            <td>{{ $item->stok }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>{{ $item->pemasok->nama_pemasok }}</td>
                                            <td>{{ $item->kategori->nama_kategori }}</td>
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
@endsection
