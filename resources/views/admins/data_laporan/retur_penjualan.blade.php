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
                <div class="row mb-2">
                    <div class="col-sm-5 mt-1">
                        <input class="form-control form-control-sm" id="from_date" type="date" name="from_date" placeholder="Start Date">
                    </div>
                    <div class="col-sm-5 mt-1">
                        <input class="form-control form-control-sm" id="to_date" type="date" name="to_date" placeholder="End Date">
                    </div>
                    <div class="col-sm-2 mt-1">
                        <button type="button" id="filter" name="filter" class="btn btn-dark btn-sm">Cari</button>
                    </div>
                </div>
                {{-- <a href="{{ url( Auth::user()->role_user->role->name.'/cetak_retur_penjualan') }}" class="btn btn-purple btn-sm" target="_blank"><i class="fas fa-print mr-1"></i> Cetak Laporan</a> --}}
                {{-- <h4>Laporan Persediaan</h4>
                <hr> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive mt-1">
                            <table id="data_retur_penjualan" class="table table-striped table-bordered nowrap table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Kode Pesanan</th>
                                        <th>Total Pembayaran</th>
                                        <th>Kondisi</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
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
                                </tbody> --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function (){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            load_data();

            $('#filter').click(function () {
                var from_date = $('#from_date').val(); 
                var to_date = $('#to_date').val(); 
                if (from_date != '' && to_date != '') {
                    $('#data_retur_penjualan').DataTable().destroy();
                    load_data(from_date, to_date);
                } else {
                    Swal.fire(
                    'Required',
                    'Data Tanggal Tidak Boleh Kosong!',
                    'warning'
                    )
                }
            });

            function load_data(from_date = '', to_date = '') {
                var dataTable = $('#data_retur_penjualan').DataTable({
                    processing: true,
                    responsive: true,
                    dom: '<"html5buttons"B>itp',
                    buttons: [
                        // {extend: 'pdf', title: 'ExampleFile'},
                        {extend: 'print',
                        costumize: function (win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size','10px');
                            $(win.document.body).find('table').addClass('compact').css('font-size','inherit');
                        }
                    }
                    ],
                    ajax: {
                            url: "{{ url(''.Auth::user()->role_user->role->name.'/laporan_retur_penjualan/show') }}",
                            type: 'GET',
                            data: {
                                from_date: from_date, 
                                to_date: to_date,
                            },
                        },
                    columns: [
                        {data: 'DT_RowIndex'},
                        {data: 'nama_pelanggan', name: 'nama_pelanggan'},
                        {data: 'kode_pesanan', name: 'kode_pesanan'},
                        {data: 'total_pembayaran', name: 'total_pembayaran'},
                        {data: 'kondisi', name: 'kondisi'},
                        {data: 'tanggal', name: 'tanggal'},
                        ]
                    });
                }
            });
    </script>
@endsection