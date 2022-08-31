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
                {{-- <h4>Data Pelanggan</h4>
                <hr> --}}
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
                {{-- <a href="{{ url( Auth::user()->role_user->role->name.'/cetak_daftar_pelanggan') }}" class="btn btn-purple btn-sm" target="_blank"><i class="fas fa-print mr-1"></i> Cetak Laporan</a> --}}
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive mt-1">
                            <table id="daftar_pelanggan" class="table table-striped table-bordered nowrap table-sm">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Pelanggan</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Nomor Telepon</th>
                                        <th>Alamat</th>
                                        <th>Tanggal</th>
                                    </tr>
                                </thead>
                                {{-- <tbody>
                                    @foreach ($data_pelanggan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if($item->pelanggan_id == Null)
                                                    <span style="color: orange">Belum Verifikasi</span>
                                                @else
                                                    {{ $item->pelanggan_id }}
                                                @endif
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>@if($item->no_telp == Null)
                                                <span style="color: orange">Belum Diisi</span>
                                            @else
                                                {{ $item->no_telp }}
                                            @endif</td>
                                            <td>
                                                @if($item->alamat == Null)
                                                    <span style="color: orange">Belum Diisi</span>
                                                @else
                                                    {{ $item->alamat }}
                                                @endif
                                            </td>
                                            <td>
                                                {{ $item->created_at->translatedFormat('d F Y H:i:s').' WIB' }}
                                                {{ $item->created_at }}
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
                    $('#daftar_pelanggan').DataTable().destroy();
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
                var dataTable = $('#daftar_pelanggan').DataTable({
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
                            url: "{{ route('daftar_pelanggan_show') }}",
                            type: 'GET',
                            data: {
                                from_date: from_date, 
                                to_date: to_date,
                            },
                        },
                    columns: [
                        {data: 'DT_RowIndex'},
                        {data: 'pelanggan_id', name: 'pelanggan_id'},
                        {data: 'nama', name: 'nama'},
                        {data: 'no_telp', name: 'no_telp'},
                        {data: 'alamat', name: 'alamat'},
                        {data: 'tanggal', name: 'tanggal'},
                        ]
                    });
                }
            });
    </script>
@endsection