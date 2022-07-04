@extends('layouts.main_user')

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
                    <table class="table table-bordered">
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
                            <tr class="text-center">
                                <td>1</td>
                                <td>Minyak Goreng</td>
                                <td>5</td>
                                <td>20 Juni 2022</td>
                                <td>
                                    <span style="font-size: 14px" class="badge badge-warning">Belum Lunas</span>
                                </td>
                                <td>
                                    <a href="{{ url('dashboard/konfirmasi_pesanan') }}" class="btn btn-success btn-sm">Konfirmasi</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection