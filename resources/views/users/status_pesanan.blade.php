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
                                <th>Kode Pesanan</th>
                                <th>Tanggal Pemesanan</th>
                                <th>Total Harga</th>
                                <th>Status Pembayaran</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_pesanan as $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_pesanan }}</td>
                                    <td>{{ $item->created_at->translatedFormat('d F Y | H:i').' WIB' }}</td>
                                    <td>{{ $item->jumlah_harga }}</td>
                                    <td>
                                        @if($item->status_pembayaran == 0)
                                            <span style="font-size: 14px" class="badge badge-warning">Belum Lunas</span>
                                        @elseif($item->status_pembayaran == 1)
                                            <span style="font-size: 14px" class="badge badge-success">Sudah Lunas</span>
                                        @endif
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