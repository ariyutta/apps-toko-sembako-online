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
                                <th>Bukti Pembayaran</th>
                                <th></th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_pesanan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->kode_pesanan }}</td>
                                    <td>{{ 'Rp. '.number_format($item->jumlah_total , 0, ",", "."); }}</td>
                                    <td>
                                        @if($item->bukti_pembayaran == Null)
                                            <span style="font-size: 14px" class="badge badge-warning">Belum diupload</span>
                                        @else
                                            <span style="font-size: 14px" class="badge badge-success">Sudah diupload</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(empty($item->bukti_pembayaran))
                                            <button class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></button>
                                        @elseif($item->bukti_pembayaran)
                                        <button id="set_dtl" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-detail"
                                            data-bukti_pembayaran="{{ $item->bukti_pembayaran }}"    
                                        ><i class="fas fa-eye"></i></button>
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
                                            <button class="btn btn-purple btn-sm" onclick="verifikasi_pembayaran({{ $item->id }})">Verifikasi</button>
                                        @elseif($item->status_pembayaran == 1)
                                            <button class="btn btn-danger btn-sm" onclick="batalkan_pembayaran({{ $item->id }})">Batalkan</button>
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

    {{-- MODAL DETAIL BUKTI PEMBAYARAN --}}
    <div class="modal fade" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    </script>
@endsection