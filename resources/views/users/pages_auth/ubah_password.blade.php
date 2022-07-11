@extends('layouts.main_user')

@section('title')
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ $title_user }}</li>
        </ol>
    </div>
    <h4 class="page-title">{{ $title_user }}</h4>
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card-box shadow">
                <p class="text-muted font-14 mb-3">
                  <span style="color: rgb(255, 19, 58)"><b><span>Perhatian!</span></b> <br> Fitur ini digunakan untuk mengubah password, password yang sudah diubah maka tidak akan dikembalikan lagi.</span>
                </p>
                <form action="{{ url('/home/update_password') }}" method="POST">
                  @method('PUT')
                  {{ csrf_field() }}
                    <div class="form-group">
                      <label for="current_password">Password Lama</label>
                      <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Password Lama" required>
                    </div>
                    <div class="form-group">
                      <label for="password">Password Baru</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password Baru" required>
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" required>
                      </div>
                    <div class="d-flex justify-content-end mt-3">
                        <button style="font-weight: bold" type="submit" class="btn btn-purple mr-2"> Simpan Perubahan </button>
                        <a style="font-weight: bold" href="{{ url('home') }}" class="btn btn-secondary"> Kembali </a>
                    </div>
                  </form>
            </div>
        </div>
    </div>
@endsection