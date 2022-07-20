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
                <h3 style="font-weight: bold">Laporan Penjualan Toko</h3>
                <p>Menjual Barang dan Perlengkapan Aneka Ragam Sembako <br> Jalan Arteri Supadio</p>
            </div>
            <div class="mt-4">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Nama Pelanggan</th>
                            <th>Jumlah Item</th>
                            <th>Jumlah Harga</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data_detail as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->barang->kode_barang }}</td>
                                <td>{{ $item->barang->nama_barang }}</td>
                                <td>{{ $item->pesanan->user->name }}</td>
                                <td>{{ $item->jumlah_item }}</td>
                                <td>{{ 'Rp. '.number_format($item->total_harga_barang , 0, ",", "."); }}</td>
                                <td>{{ $item->created_at }}</td>
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