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
                {{-- <h4>Verifikasi Pembayaran</h4>
                <hr> --}}
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped table-bordered table-sm nowrap">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Pelanggan</th>
                                <th>Kode Pesanan</th>
                                <th>Total Pembayaran</th>
                                <th>Barang Bukti</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($retur_penjualan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->kode_pesanan }}</td>
                                    <td>{{ 'Rp. '.number_format($item->jumlah_total , 0, ",", "."); }}</td>
                                    <td>
                                        <button class="btn btn-success btn-sm"><i class="fas fa-eye"></i></button>
                                    </td>
                                    <td>
                                        Kondisi
                                    </td>
                                    <td>
                                        <button class="btn btn-purple btn-sm">Return</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- MODAL DETAIL BUKTI PEMBAYARAN --}}
    {{-- <div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Detail Bukti Pembayaran</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <img src="" id="bukti_bayar" width="400" height="450">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $(document).on('click','#set_dtl', function() {
                var bukti = $(this).data('bukti_pembayaran');
                $('#bukti_bayar').attr("src","{{ asset('bukti_pembayaran') }}/"+bukti);
            })
        })
    </script> --}}
@endsection