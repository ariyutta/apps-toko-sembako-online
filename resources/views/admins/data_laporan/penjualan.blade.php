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
                {{-- <h4>Laporan Penjualan</h4>
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
                                        <th>Nama Pelanggan</th>
                                        <th>Jumlah Item</th>
                                        <th>Jumlah Harga</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_detail as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->barang->kode_barang }}</td>
                                            <td>{{ $item->barang->nama_barang }}</td>
                                            <td>{{ $item->pesanan->user->name }}</td>
                                            <td>{{ $item->jumlah_item }}</td>
                                            <td>{{ 'Rp. '.number_format($item->total_harga_barang , 0, ",", "."); }}</td>
                                            <td>{{ $item->created_at }}</td>
                                            {{-- <td>{{ $item->created_at->translatedFormat('d F Y H:i:s').' WIB' }}</td> --}}
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
