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
                <p class="container"><span style="color: orange; font-weight:bold">Perhatian!</span><br> 
                    Harap untuk melakukan pengecekan terhadap barang yang ingin dibeli.</p>
                <div class="table-responsive container">
                    <table id="datatable" class="table table-bordered nowrap table-sm dt-responsive">
                        <thead>
                            <tr class="text-center">
                                <th>
                                    No.
                                </th>
                                <th>Lampiran</th>
                                <th>Nama Barang</th>
                                <th>Total Item</th>
                                <th>Harga</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_keranjang as $item)
                                <tr class="text-center">
                                    <td style="padding-top: 45px">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        <img src="{{ asset('gambar_barang/'.$item->gambar_barang) }}" alt="default.png" height="100px">
                                    </td>
                                    <td style="padding-top: 45px">{{ $item->barang->nama_barang }}</td>
                                    <td style="padding-top: 45px">{{ $item->jumlah_barang }}</td>
                                    <td style="padding-top: 45px">{{ 'Rp. '.number_format($item->jumlah_harga , 0, ",", "."); }}</td>
                                    <td style="padding-top: 40px">
                                        <button style="font-weight: bold" onclick="confirm_hapus_keranjang({{ $item->id }})" class="btn btn-danger btn-sm">Hapus</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="text-center">
                                <th colspan="4">TOTAL HARGA</th>
                                {{-- <th></th> --}}
                                {{-- <th>TOTAL HARGA</th> --}}
                                {{-- <th>:</th> --}}
                                <th>{{ 'Rp. '.number_format($total_keranjang , 0, ",", "."); }}</th>
                                <th></th>
                            </tr>
                        </tfoot>
                    </table>
                    <div class="d-flex justify-content-end mt-2 mb-2">
                        <button type="submit" style="font-weight: bold" onclick="confirm_checkout()" class="btn btn-success mr-1 mt-1">Checkout</button>
                        <a style="font-weight: bold" href="{{ url('dashboard') }}" class="btn btn-secondary mt-1">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection