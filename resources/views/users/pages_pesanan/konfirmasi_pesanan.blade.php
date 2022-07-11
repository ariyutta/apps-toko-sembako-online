@extends('layouts.main_user')

@section('title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ url('home/status_pesanan') }}">Status Pesanan</a></li>
            <li class="breadcrumb-item active">{{ $title_user }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ $title_user }}</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box shadow">
                    <form action="#">
                        <div class="form-group">
                            <label for="nama_penerima">Nama Penerima</label>
                            <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" aria-describedby="emailHelp">
                          </div>
                        <div class="form-group">
                            <label for="komentar">Komentar</label>
                            <textarea class="form-control" id="komentar" name="komentar" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="status_pesanan">Status</label>
                            <select class="form-control" id="status_pesanan" name="status_pesanan">
                              <option>-- Status Pesanan --</option>
                              <option>Belum Diterima</option>
                              <option>Sudah Diterima</option>
                            </select>
                          </div>
                            <label for="status_pesanan" class="mr-2 mt-2">Rating</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox1" value="option1" checked>
                            <label class="form-check-label" for="inlineCheckbox1">★ 1</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">★ 2</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox1" value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">★ 3</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">★ 4</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" id="inlineCheckbox2" value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">★ 5</label>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="#" class="btn btn-success mr-1 mt-2" style="font-weight: bold">Selesai</a>
                            <a href="{{ url('home/status_pesanan') }}" class="btn btn-secondary mt-2" style="font-weight: bold">Batalkan</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection