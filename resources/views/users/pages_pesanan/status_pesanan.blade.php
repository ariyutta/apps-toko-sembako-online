@extends('layouts.main_user')

@section('css')
    
@endsection

@section('title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
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
                                <th>Harga Total</th>
                                <th>Status Pembayaran</th>
                                <th>Status Pesanan</th>
                                <th>Lihat</th>
                                <th>Retur Pesanan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_pesanan as $item)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kode_pesanan }}</td>
                                    <td>{{ $item->created_at->translatedFormat('d F Y | H:i').' WIB' }}</td>
                                    <td>{{ 'Rp. '.number_format($item->jumlah_total , 0, ",", "."); }}</td>
                                    <td>
                                        @if($item->status_pembayaran == 0)
                                            <span style="font-size: 14px" class="badge badge-warning">Belum Lunas</span>
                                        @elseif($item->status_pembayaran == 1)
                                            <span style="font-size: 14px" class="badge badge-success">Sudah Lunas</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status_pesanan == 0)
                                            <span style="font-size: 14px" class="badge badge-warning">Belum diterima</span>
                                        @elseif($item->status_pesanan == 1)
                                            <span style="font-size: 14px" class="badge badge-success">Sudah diterima</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a style="font-weight: bold" href="{{ url('home/status_pesanan/detail/'. $item->id) }}" class="btn btn-purple btn-sm"><i class="far fa-eye"></i></a>
                                    </td>
                                    <td>
                                        @if($item->retur_penjualan == Null)
                                            <a style="font-weight: bold" href="{{ url('home/retur_pesanan/'. $item->id) }}" class="btn btn-danger btn-sm"><i class="fas fa-dumpster-fire mr-1"></i> Ajukan</a>
                                        @elseif($item->retur_penjualan->status_aktif == 1)
                                            Sedang diproses
                                        @elseif($item->retur_penjualan->status_aktif == 2)
                                            Pesanan dibatalkan
                                        @endif
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