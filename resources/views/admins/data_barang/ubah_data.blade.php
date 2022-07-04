@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box shadow">
                <h4>Ubah Data Barang</h4>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{ url('dashboard/admins/data_barang/simpan_data', $data_barang->id) }}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="form-group col-sm-12">
                                    <label for="kode_barang">Kode Barang</label>
                                    <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="{{ $data_barang->kode_barang }}">
                                </div>
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
                                            <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
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
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
