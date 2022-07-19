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
                                <th>Kondisi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($retur_penjualan as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->user->name }}</td>
                                    <td>{{ $item->pesanan->kode_pesanan }}</td>
                                    <td>{{ 'Rp. '.number_format($item->total_harga_pesanan , 0, ",", "."); }}</td>
                                    <td>
                                      @if(empty($item->bukti_barang))
                                        <button class="btn btn-secondary btn-sm"><i class="fas fa-eye"></i></button>
                                      @elseif($item->bukti_barang)
                                        <button id="set_dtl" class="btn btn-success btn-sm" data-toggle="modal" data-target="#modal-detail"
                                          data-bukti_barang="{{ $item->bukti_barang }}"    
                                      ><i class="fas fa-eye"></i></button>
                                      @endif 
                                    </td>
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
                                    <td>
                                        @if($item->status_aktif == 1)
                                          <button type="submit" class="btn btn-purple btn-sm" onclick="terima_retur({{ $item->id }})">Terima Retur</button>
                                        @elseif($item->status_aktif == 2)
                                          Berhasil dikembalikan
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
          <h5 class="modal-title" id="exampleModalLabel">Detail Kondisi Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <img src="" id="bukti_barang" width="400" height="450">
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
                var bukti = $(this).data('bukti_barang');
                $('#bukti_barang').attr("src","{{ asset('bukti_barang') }}/"+bukti);
            })
        })

      function terima_retur(id_retur) {
            Swal.fire({
                    title: "Retur Pesanan",
                    text: "Apakah anda ingin menghapus barang ini dari daftar kerajang?",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonText: "Ya!",
                    cancelButtonText: "Batal!",
                    confirmButtonClass: "btn btn-xl btn-success",
                    cancelButtonClass: "btn btn-xl btn-danger ml-2",
                    buttonsStyling: !1
                })
                .then(function(t) {
                    if (t.value) {
                        $(".loading").show();
                        $.get("{{ url( Auth::user()->role_user->role->name.'/terima_retur') }}/" +id_retur);
                        location.reload();
                    }
                })
            }
    </script>
@endsection