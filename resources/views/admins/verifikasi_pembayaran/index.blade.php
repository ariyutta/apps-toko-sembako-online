@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card-box shadow">
                <h4>Verifikasi Pembayaran</h4>
                <hr>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
@endsection
