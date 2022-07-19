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
                <a href="{{ url( Auth::user()->role_user->role->name.'/cetak_daftar_pelanggan') }}" class="btn btn-purple btn-sm" target="_blank"><i class="fas fa-print mr-1"></i> Cetak Laporan</a>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive mt-3">
                            <table id="datatable" class="table table-striped table-bordered nowrap table-sm">
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
                                <tbody>
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
                                                {{-- {{ $item->created_at->translatedFormat('d F Y H:i:s').' WIB' }} --}}
                                                {{ $item->created_at }}
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
