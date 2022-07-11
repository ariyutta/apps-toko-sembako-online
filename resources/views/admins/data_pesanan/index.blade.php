@extends('layouts.main')
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
                {{-- <h4>Data Pesanan</h4>
                <hr> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive mt-3">
                            <table id="datatable" class="table table-striped table-bordered nowrap table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Pesanan</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Jenis Pengiriman</th>
                                        <th>Total Harga</th>
                                        <th>Status Pesanan</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data_pesanan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode_pesanan }}</td>
                                            <td>{{ $item->user->name }}</td>
                                            <td>
                                                @if($item->jenis_pengiriman == 'jne')
                                                    JNE Reguler
                                                @elseif($item->jenis_pengiriman == 'jnt')
                                                    JNT Express
                                                @endif
                                            </td>
                                            <td>{{ 'Rp. '.number_format($item->jumlah_total, 0, ",", "."); }}</td>
                                            <td>
                                                @if($item->status_pesanan == 0)
                                                    <span style="font-size: 14px" class="badge badge-warning">Belum diterima</span>
                                                @else 
                                                    <span style="font-size: 14px" class="badge badge-success">Sudah diterima</span>
                                                @endif
                                            </td>
                                            <td>{{ $item->created_at }}</td>
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
