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

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box shadow">
                <h4>Verifikasi Pembayaran</h4>
                <hr>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-sm nowrap">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pelanggan</th>
                                <th>Kode Pesanan</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_pesanan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ 'KDP-'.$item->kode_pesanan }}</td>
                                    <td>
                                        @if($item->gambar_pembayaran == Null)
                                            <span style="font-size: 14px" class="badge badge-warning">Belum diupload</span>
                                        @else
                                            <img src="{{ asset('gambar_barang/'. $item->gambar_pembayaran) }}" alt="" height="200px">
                                        @endif
                                    </td>
                                    <td>
                                        @if($item->status_pembayaran == 0)
                                            <span style="font-size: 14px" class="badge badge-warning">Belum Lunas</span>
                                        @elseif($item->status_pembayaran == 1)
                                            <span style="font-size: 14px" class="badge badge-success">Sudah Lunas</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @if($item->status_pembayaran == 0)
                                            <a href="{{ url('dashboard/admins/verifikasi_pembayaran/verif/'.$item->id) }}" class="btn btn-purple btn-sm">Verifikasi</a>
                                        @elseif($item->status_pembayaran == 1)
                                            <a href="{{ url('dashboard/admins/verifikasi_pembayaran/batal/'.$item->id) }}" class="btn btn-danger btn-sm">Batalkan</a>
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
