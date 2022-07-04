@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box shadow">
                <h4>Ubah Data Kategori</h4>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{ url('dashboard/admins/data_kategori/simpan_data', $data_kategori->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                              <label for="nama_kategori">Nama Kategori</label>
                              <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $data_kategori->nama_kategori }}">
                            </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success mr-2">Simpan Perubahan</button>
                                <a href="{{ url('dashboard/admins/data_kategori') }}" class="btn btn-secondary">Batal</a>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
