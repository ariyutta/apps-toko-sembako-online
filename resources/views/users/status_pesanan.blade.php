@extends('layouts.main_user')

@section('css')
    
@endsection

@section('title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Rekomendasi</a></li>
            <li class="breadcrumb-item active">{{ $title_user }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ $title_user }}</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box shadow">
                <p><span style="color: orange; font-weight:bold">Perhatian!</span><br> Apabila barang yang telah dikirim sudah sampai tujuan, harap untuk melakukan konfirmasi jika barang sudah diterima.</p>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered nowrap">
                        <thead>
                            <tr class="text-center">
                                <th>No.</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Status Pesanan</th>
                                <th>Konfirmasi Terima Barang</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_pesanan as $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->barang->nama_barang }}</td>
                                    <td>5</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <span style="font-size: 14px" class="badge badge-warning">Belum Lunas</span>
                                    </td>
                                    <td>
                                        <a href="{{ url('dashboard/status_pesanan/detail/'. $item->id) }}" class="btn btn-primary btn-sm"><i class="far fa-eye mr-1"></i> Lihat</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection