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
                                        <th>Nama Pelanggan</th>
                                        <th>Kode Pesanan</th>
                                        <th>Total Pembayaran</th>
                                        <th>Kondisi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($retur_penjualan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>{{ $item->pesanan->kode_pesanan }}</td>
                                            <td>{{ 'Rp. '.number_format($item->pesanan->jumlah_total , 0, ",", "."); }}</td>
                                            <td>
                                                @if($item->kondisi == Null)
                                                    Null
                                                @elseif($item->kondisi == 'rusak')
                                                    Rusak
                                                @elseif($item->kondisi == 'lecet')
                                                    Lecet
                                                @elseif($item->kondisi == 'robek')
                                                    Robek
                                                @elseif($item->kondisi == 'pecah')
                                                    Pecah
                                                @elseif($item->kondisi == 'lainnya')
                                                    Lainnya
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
        </div>
    </div>
@endsection
