@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box shadow">
                <h4>Ubah Data Pemasok</h4>
                <hr>
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{ url('dashboard/admins/data_pemasok/simpan_data', $data_pemasok->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                              <label for="nama_pemasok">Nama Pemasok</label>
                              <input type="text" class="form-control" id="nama_pemasok" name="nama_pemasok" value="{{ $data_pemasok->nama_pemasok }}">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ $data_pemasok->alamat }}</textarea>
                              </div>
                            <div class="form-group">
                                <label for="no_telp">No. Telepon</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ $data_pemasok->no_telp }}">
                              </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success mr-2">Simpan Perubahan</button>
                                <a href="{{ url('dashboard/admins/data_pemasok') }}" class="btn btn-secondary">Batal</a>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
