@extends('layouts.main')

@section('title')
    <div class="d-flex justify-content-between">
        <h4 class="mt-2">{{ $title_admin }}</h4>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url(''.Auth::user()->role_user->role->name.'') }}">{{ Auth::user()->role_user->role->display_name }}</a></li>
            <li class="breadcrumb-item active">{{ $title_admin }}</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box shadow">
                <div class="row">
                    <div class="col-sm-4 mt-2">
                        <div class="row d-flex justify-content-center">
                            <img src="{{ asset('gambar_profil/'.$data->gambar_profil) }}" alt="default.jpg" width="250" class="rounded-circle shadow">
                        </div>
                    </div>
                    <div class="col-sm-8 mt-2 mb-2">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-0 table-sm">
                                <tbody>
                                    <tr>
                                        <td width="35%">ID Pelanggan</td>
                                        {{-- <td width="65%"><a href="#" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">{{ $data->nik }}</a></td> --}}
                                        <td width="65%">
                                            @if($data->pelanggan_id == Null)
                                                <span style="color: orange">Belum Diisi</span>
                                            @else
                                                {{ $data->pelanggan_id }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%">Nama Lengkap</td>
                                        {{-- <td width="65%"><a href="#" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">{{ $data->nik }}</a></td> --}}
                                        <td width="65%">
                                            {{ $data->name }}
                                        </td>
                                    </tr>
                                    {{-- <tr>
                                        <td width="35%">Tempat/Tanggal Lahir</td>
                                        
                                        <td width="65%">
                                            @if($data->tempat_lahir == Null && $data->tgl_lahir == Null)
                                                <span style="color: orange">Belum Diisi</span>
                                            @else
                                                {{ $data->tempat_lahir }}, {{ Carbon\Carbon::createFromFormat('Y-m-d', $data->tgl_lahir)->translatedFormat('d F Y');}}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%">Jenis Kelamin</td>
                                       
                                        <td width="65%">
                                            @if($data->jenis_kelamin == Null)
                                                <span style="color: orange">Belum Diisi</span>
                                            @elseif($data->jenis_kelamin == '0')
                                                <span style="color: orange">Belum Diisi</span>
                                            @elseif($data->jenis_kelamin == '1')
                                                Laki-Laki
                                            @elseif($data->jenis_kelamin == '2')
                                                Perempuan
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%">Agama</td>
                                        
                                        <td width="65%">
                                            @if($data->agama == Null)
                                                <span style="color: orange">Belum Diisi</span>
                                            @else
                                                {{ $data->agama->nama_agama }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%">Pekerjaan</td>
                                        
                                        <td width="65%">
                                            @if($data->pekerjaan == Null)
                                                <span style="color: orange">Belum Diisi</span>
                                            @else
                                                {{ $data->pekerjaan->nama_pekerjaan }}
                                            @endif
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <td width="35%">Alamat</td>
                                        {{-- <td width="65%"><a href="#" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">{{ $data->nik }}</a></td> --}}
                                        <td width="65%">
                                            @if($data->alamat == Null)
                                                <span style="color: orange">Belum Diisi</span>
                                            @else
                                                {{ $data->alamat }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="35%">No. Handphone</td>
                                        {{-- <td width="65%"><a href="#" id="inline-username" data-type="text" data-pk="1" data-title="Enter username">{{ $data->nik }}</a></td> --}}
                                        <td width="65%">
                                            @if($data->no_telp == Null)
                                                <span style="color: orange">Belum Diisi</span>
                                            @else
                                                {{ $data->no_telp }}
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="d-flex justify-content-end">
                                <a style="font-weight: bold" href="{{ url(''.Auth::user()->role_user->role->name.'/edit_accounts/'.$data->id) }}" class="btn btn-purple mt-2 mr-2"> Ubah Data</a>
                                <a style="font-weight: bold" href="{{ url(''.Auth::user()->role_user->role->name.'') }}" class="btn btn-secondary mt-2"> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection