@extends('layouts.main')

@section('title')
    <div class="d-flex justify-content-between">
        <h4 class="mt-2">{{ $title_admin }}</h4>
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url(''.Auth::user()->role_user->role->name.'') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ url(''.Auth::user()->role_user->role->name.'/data_payment') }}">Data Payment</a></li>
            <li class="breadcrumb-item active">{{ $title_admin }}</li>
        </ol>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box shadow">
                {{-- <h4>Ubah Data payment</h4>
                <hr> --}}
                <div class="row">
                    <div class="col-sm-12">
                        <form action="{{ url(''.Auth::user()->role_user->role->name.'/data_payment/simpan_data', $data_payment->id) }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group">
                              <label for="nama_payment">Nama Payment</label>
                              <input type="text" class="form-control" id="nama_payment" name="nama_payment" value="{{ $data_payment->nama_payment }}">
                            </div>
                            <div class="form-group">
                                <label for="no_payment">Nomor Payment</label>
                                <input type="text" class="form-control" id="no_payment" name="no_payment" value="{{ $data_payment->no_payment }}">
                              </div>
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-success mr-2">Simpan Perubahan</button>
                                <a href="{{ url(''.Auth::user()->role_user->role->name.'/data_payment') }}" class="btn btn-secondary">Batal</a>
                            </div>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
