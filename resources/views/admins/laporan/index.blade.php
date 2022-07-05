@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box shadow">
                <h4>Laporan</h4>
                <hr>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                {{ __('Sedang Menunggu Lanjutan Mock Up Berikutnya! Jangan lupa kasih skema mock up nya yaa..') }}
            </div>
        </div>
    </div>
@endsection
