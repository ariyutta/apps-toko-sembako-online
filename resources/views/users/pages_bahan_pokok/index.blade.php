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
    @auth
        @if(Auth::user()->status_verifikasi != 1)
            <!-- Modal Tamba dan ubah Kategori Berita -->
            <div id="modal_all" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="modal-title">Selamat Datang, {{ Auth::user()->name }}!</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body text-center" style="overflow-x: auto;">
                            <div class="col-lg-12">
                                <p> Silahkan untuk melengkapi data profil agar kami dapat mempermudah proses transaksi anda, Terima Kasih. </p>
                            </div>
                            <div class="col-lg-12">
                                <a href="{{ url('home/accounts') }}" class="btn btn-purple pull-left"
                                    onclick="window.close();"><i
                                        class="fas fa-user mr-1"></i> Masuk Halaman Profil</a>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
        @endif
    @endauth

    <div class="row">
        @foreach ($data as $item)
            @if($item->stok == 0)
                <div class="col-md-3">
                    <div class="card card-body shadow text-center">
                        <img class="card-img-top img-fluid" src="{{ asset('gambar_barang/'. $item->gambar_barang) }}" alt="Card image cap">
                        <h4 class="card-title mt-2 text-danger">{{ $item->nama_barang }}</h4>
                        <p style="font-size: 16px" class="card-text">{{ 'Rp. '.number_format($item->harga_jual , 0, ",", "."); }}</p>
                        <button style="font-weight: bold" onclick="Swal.fire('Stok Habis','Maaf stok barang sudah habis!','warning')" class="btn btn-danger">Stok Habis</button>
                    </div>
                </div>
            @else
                <div class="col-md-3">
                    <div class="card card-body shadow text-center">
                        <img class="card-img-top img-fluid" src="{{ asset('gambar_barang/'. $item->gambar_barang) }}" alt="Card image cap">
                        <h4 class="card-title mt-2">{{ $item->nama_barang }}</h4>
                        <p style="font-size: 16px" class="card-text">{{ 'Rp. '.number_format($item->harga_jual , 0, ",", "."); }}</p>
                        <a style="font-weight: bold" href="{{ url('home/'.$item->kategori->url_link.'/detail/'. $item->id) }}" class="btn btn-success">Cek Detail</a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    <div class="d-flex justify-content-center mt-1 mb-1">
        {{ $data->links() }}
    </div>
@endsection