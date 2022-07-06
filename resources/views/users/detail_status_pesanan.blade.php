@extends('layouts.main_user')

@section('css')
  <style>
    .table tr th {
      text-align: center;
      vertical-align: middle;
    }

    .table tr td {
      text-align: center;
      vertical-align: middle;
    }
  </style>
@endsection

@section('title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Rekomendasi</a></li>
            <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Status Pesanan</a></li>
            <li class="breadcrumb-item active">{{ $title_user }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ $title_user }}</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box shadow">
                <div class="container">
                    <h4>Selamat!</h4>
                <p>Barang Anda telah berhasil dipesan, silahkan untuk melanjutkan pembayaran dengan meng-klik tombol Pembayaran dibawah halaman.</p>
                <hr>
                <table>
                    <tr>
                        <th colspan="5">Kode Pesanan</th>
                        <th style="text-indent: 20px">:</th>
                        <th style="text-indent: 20px">{{ $data_pesanan->kode_pesanan }}</th>
                    </tr>
                    <tr>
                        <th colspan="5">Tanggal Pesanan</th>
                        <th style="text-indent: 20px">:</th>
                        <th style="text-indent: 20px">{{ $data_pesanan->created_at->translatedFormat('d F Y | H:i:s').' WIB' }}</th>
                    </tr>
                    <tr>
                        <th colspan="5">Status Pembayaran</th>
                        <th style="text-indent: 20px">:</th>
                        <th style="text-indent: 20px">
                            @if($data_pesanan->status_pembayaran == 0)
                                Belum Lunas
                            @elseif($data_pesanan->status_pembayaran == 1)
                                Sudah Lunas
                            @endif
                        </th>
                    </tr>
                </table>
                <hr>
                    <div class="table-responsive mt-3">
                        <table id="datatable" class="table table-bordered table-sm nowrap">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah Item</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data_pesanan->pesanan_detail as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <img src="{{ asset('gambar_barang/'.$item->barang->gambar_barang) }}" alt="" height="100px">
                                        </td>
                                        <td>{{ $item->barang->nama_barang }}</td>
                                        <td>{{ $item->jumlah_item }}</td>
                                        <td>{{ 'Rp. '.number_format($item->total_harga_barang , 0, ",", "."); }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <th colspan="4">TOTAL HARGA</th>
                                    <th>{{ 'Rp. '.number_format($total_pesanan , 0, ",", "."); }}</th>
                                </tr>
                            </tfoot>
                        </table>
                        <hr>
                        <div class="d-flex justify-content-end mb-2">
                            @if($data_pesanan->status_pembayaran != 1)
                                <a style="font-weight: bold" href="{{ url('dashboard/pembayaran_pesanan/'.$data_pesanan->id) }}" class="btn btn-success mr-1">Lanjutkan Pembayaran</a>
                            @endif
                            <a style="font-weight: bold" href="{{ url('dashboard/status_pesanan') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection