@extends('layouts.main')

@section('title')
    <div class="d-flex justify-content-between">
        <h4 class="mt-2">{{ $title_admin }}</h4>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url(''.Auth::user()->role_user->role->name.'') }}">{{ Auth::user()->role_user->role->display_name }}</a></li>
            <li class="breadcrumb-item"><a href="{{ url(''.Auth::user()->role_user->role->name.'/accounts') }}">My Account</a></li>
            <li class="breadcrumb-item active">{{ $title_admin }}</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box shadow">
                <h4>
                    @if($data->name != Null)
                        {{ $data->name }}
                    @endif
                </h4>
                <hr style="border: 1px solid rgba(75, 74, 74, 0.13);">
                <form action="{{ url(''.Auth::user()->role_user->role->name.'/simpan_accounts', $data->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-sm-4 mt-2">
                            <div class="container">
                                <div class="row d-flex justify-content-center shadow mb-3">
                                    <img src="{{ asset('gambar_profil/'.$data->gambar_profil) }}" style=" height:250px;" alt="default.png" class="rounded-circle shadow mb-4 mt-4">
                                    <input type="hidden" name="oldImage" value="{{ $data->gambar_profil }}">
                                    <div class="container">
                                        <input style="height:37px;" type="file" class="form-control-file form-control-sm mt-2 mb-2" id="gambar_profil" name="gambar_profil">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 mt-2 mb-2">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped mb-0 table-sm">
                                    <tbody>
                                        <tr>
                                            <td width="35%">ID Pelanggan</td>
                                            <td width="65%">
                                                @if($data->pelanggan_id == Null)
                                                    <fieldset disabled="disabled">
                                                        <input type="text" class="form-control form-control-sm" style="background-color: rgb(240, 240, 240)" id="pelanggan_id" name="pelanggan_id" value="" required>
                                                    </fieldset>
                                                    <small class="form-text" style="color: rgb(0, 218, 11)">*ID Pelanggan akan terisi secara otomatis oleh sistem.</small>
                                                @else
                                                    <span class="container" style="font-weight: bold; font-size: 15px">{{ $data->pelanggan_id }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="35%">Nama Lengkap</td>
                                            <td width="65%">
                                                @if($data->name == Null)
                                                    <input type="text" class="form-control form-control-sm" id="name" name="name" value="" required>
                                                @else
                                                    <input type="text" class="form-control form-control-sm" id="name" name="name" value="{{ $data->name }}" required>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="35%">Tempat/Tanggal Lahir</td>
                                            <td width="65%">
                                                @if($data->tempat_lahir == Null && $data->tanggal_lahir == Null)
                                                    <div class="form-group form-inline">
                                                        <input type="text" class="col-sm-6 form-control form-control-sm mb-1" id="tempat_lahir" name="tempat_lahir" required>
                                                        <input type="date" class="col-sm-6 form-control form-control-sm mb-1" id="tgl_lahir" name="tgl_lahir" required>
                                                    </div>
                                                @else
                                                    <div class="form-group form-inline">
                                                        <input type="text" class="col-sm-6 form-control form-control-sm mb-1" id="tempat_lahir" name="tempat_lahir" value="{{ $data->tempat_lahir }}" required>
                                                        <input type="date" class="col-sm-6 form-control form-control-sm mb-1" id="tgl_lahir" name="tgl_lahir" value="{{ $data->tgl_lahir }}" required>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="35%">Jenis Kelamin</td>
                                            <td width="65%">
                                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-control form-control-sm" required>
                                                    <option value="*">-- Pilih Jenis Kelamin --</option>
                                                    <option value="1" @if($data->jenis_kelamin != Null) {{ $data->jenis_kelamin == '1' ? 'selected ="selected"' : ''}} @endif>Laki-Laki</option>
                                                    <option value="2" @if($data->jenis_kelamin != Null) {{ $data->jenis_kelamin == '2' ? 'selected ="selected"' : ''}} @endif>Perempuan</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="35%">Agama</td>
                                            <td width="65%">
                                                <select id="agama_id" name="agama_id" class="form-control form-control-sm" required>
                                                    <option value="*">-- Pilih Agama --</option>
                                                    @foreach ($agama as $key => $list_agama)
                                                        <option value="{{ $list_agama->id }}" @if($select_agama != Null) {{ $select_agama->id == $list_agama->id ? 'selected ="selected"' : ''}} @endif>{{ $list_agama->nama_agama }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="35%">Pekerjaan</td>
                                            <td width="65%">
                                                <select id="pekerjaan_id" name="pekerjaan_id" class="form-control form-control-sm" required>
                                                    <option value="*">-- Pilih Pekerjaan --</option>
                                                    @foreach ($pekerjaan as $key => $list_pekerjaan)
                                                        <option value="{{ $list_pekerjaan->id }}" @if($select_pekerjaan != Null) {{ $select_pekerjaan->id == $list_pekerjaan->id ? 'selected ="selected"' : ''}} @endif>{{ $list_pekerjaan->nama_pekerjaan }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="35%">Alamat</td>
                                            <td width="65%">
                                                @if($data->alamat == Null)
                                                    <textarea class="form-control form-control-sm" id="alamat" name="alamat" rows="4" required></textarea>
                                                @else
                                                    <textarea class="form-control form-control-sm" id="alamat" name="alamat" rows="4" required>{{ $data->alamat }}</textarea>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="35%">No. Handphone</td>
                                            <td width="65%">
                                                @if($data->no_telp == Null)
                                                    <input type="text" class="form-control form-control-sm" id="no_telp" name="no_telp" value="" required>
                                                @else
                                                    <input type="text" class="form-control form-control-sm" id="no_telp" name="no_telp" value="{{ $data->no_telp }}" required>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="d-flex justify-content-end mb-2">
                                    <button style="font-weight: bold" type="submit" class="btn btn-purple mt-3 mr-2"> Simpan Perubahan</button>
                                    <a style="font-weight: bold" href="{{ url(''.Auth::user()->role_user->role->name.'/accounts') }}" class="btn btn-secondary mt-3"> Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection