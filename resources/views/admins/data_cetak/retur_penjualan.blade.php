<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .table tr th {
          text-align: center;
          vertical-align: middle;
        }
    
        .table tr td {
          text-align: center;
          vertical-align: middle;
        }
      </style>
</head>
<body>
    {{-- <div style="border: 1px solid black; margin: 20px 20px 20px 20px"> --}}
        <div class="container">
            <div class="text-center mt-4">
                <h3 style="font-weight: bold">Retur Penjualan Toko</h3>
                <p>Menjual Barang dan Perlengkapan Aneka Ragam Sembako <br> Jalan Arteri Supadio</p>
            </div>
            <div class="mt-4">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Pelanggan</th>
                            <th>Kode Pesanan</th>
                            <th>Total Pembayaran</th>
                            <th>Kondisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_retur as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->pesanan->kode_pesanan }}</td>
                                <td>{{ 'Rp. '.number_format($item->pesanan->jumlah_total , 0, ",", "."); }}</td>
                                <td>
                                    @if($item->kondisi == Null)
                                        Null
                                    @elseif($item->kondisi == 'rusak')
                                        Rusak
                                    @elseif($item->kondisi == 'lecet')
                                        Lecet
                                    @elseif($item->kondisi == 'robek')
                                        Robek
                                    @elseif($item->kondisi == 'pecah')
                                        Pecah
                                    @elseif($item->kondisi == 'lainnya')
                                        Lainnya
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    {{-- </div> --}}
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>