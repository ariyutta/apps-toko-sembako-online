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
                {{-- <a href="{{ url( Auth::user()->role_user->role->name.'/cetak_laporan_persediaan') }}" class="btn btn-purple btn-sm" target="_blank"><i class="fas fa-print mr-1"></i> Cetak Laporan</a> --}}
                {{-- <h4>Laporan Persediaan</h4>
                <hr> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive mt-1">
                            <table id="data_persediaan" class="table table-striped table-bordered nowrap table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Stok</th>
                                        <th>Detail Barang</th>
                                        <th>Nama Pemasok</th>
                                        <th>Kategori</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($data_barang as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->kode_barang }}</td>
                                            <td>{{ $item->nama_barang }}</td>
                                            <td>{{ $item->stok }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td>{{ $item->pemasok->nama_pemasok }}</td>
                                            <td>{{ $item->kategori->nama_kategori }}</td>
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
                    $('#data_persediaan').DataTable().destroy();
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
                var dataTable = $('#data_persediaan').DataTable({
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
                            url: "{{ route('laporan_persediaan_show') }}",
                            type: 'GET',
                            data: {
                                from_date: from_date, 
                                to_date: to_date,
                            },
                        },
                    columns: [
                        {data: 'DT_RowIndex'},
                        {data: 'kode_barang', name: 'kode_barang'},
                        {data: 'nama_barang', name: 'nama_barang'},
                        {data: 'stok', name: 'stok'},
                        {data: 'detail_barang', name: 'detail_barang'},
                        {data: 'nama_pemasok', name: 'nama_pemasok'},
                        {data: 'kategori', name: 'kategori'},
                        {data: 'tanggal', name: 'tanggal'},
                        ]
                    });
                }
            });
    </script>
@endsection
