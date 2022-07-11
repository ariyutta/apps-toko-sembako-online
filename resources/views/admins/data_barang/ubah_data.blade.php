@extends('layouts.main')

@section('title')
    <div class="d-flex justify-content-between">
        <h4 class="mt-2">{{ $title_admin }}</h4>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url(''.Auth::user()->role_user->role->name.'') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url(''.Auth::user()->role_user->role->name.'/data_barang') }}">Data Barang</a></li>
            <li class="breadcrumb-item active">{{ $title_admin }}</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box shadow">
                {{-- <h4>Ubah Data Barang</h4>
                <hr> --}}
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{ url(''.Auth::user()->role_user->role->name.'/data_barang/simpan_data', $data_barang->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-sm-12">
                                <label for="nama_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="{{ $data_barang->nama_barang }}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="harga_jual">Harga Jual</label>
                                    <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="{{ $data_barang->harga_jual }}">
                                </div>
                                <div class="form-group col-sm-6">
                                    <label for="harga_beli">Harga Beli</label>
                                    <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="{{ $data_barang->harga_beli }}">
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="kategori_id" class="col-form-label">Kategori</label>
                                    <select id="kategori_id" name="kategori_id" class="form-control form-control-sm" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach($kategori as $key => $item)
                                            <option value="{{ $item->id }}" @if($select_kategori != Null) {{ $select_kategori->id == $item->id ? 'selected ="selected"' : ''}} @endif>{{ $item->nama_kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="stok">Stok</label>
                                    <input type="number" class="form-control" id="stok" name="stok" value="{{ $data_barang->stok }}">
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $data_barang->keterangan }}</textarea>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="gambar_barang">Gambar</label>
                                    <input class="form-control" type="file" id="gambar_barang" name="gambar_barang" data-height="180" />
                                    @if(strlen($data_barang->gambar_barang)>0)
                                        <img class="mt-3" src="{{ asset('gambar_barang/'.$data_barang->gambar_barang) }}" height="200px">
                                    @endif
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success mr-2">Simpan Perubahan</button>
                                <a href="{{ url(''.Auth::user()->role_user->role->name.'/data_barang') }}" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
