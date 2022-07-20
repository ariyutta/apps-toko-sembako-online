<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [App\Http\Controllers\FirstPagesController::class, 'index'])->name('welcome');

// Untuk Login Developer
Route::group(['middleware' =>['auth','role:developer']], function() {
    Route::get('developer', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('developer/data_pemasok', [App\Http\Controllers\DataPemasokController::class, 'data_pemasok'])->name('data_pemasok');
    Route::post('developer/data_pemasok/tambah_data', [App\Http\Controllers\DataPemasokController::class, 'tambah_data_pemasok'])->name('tambah_data_pemasok');
    Route::get('developer/data_pemasok/ubah_data/{id}', [App\Http\Controllers\DataPemasokController::class, 'ubah_data_pemasok'])->name('ubah_data_pemasok');
    Route::get('developer/data_pemasok/hapus_data/{id_pemasok}', [App\Http\Controllers\DataPemasokController::class, 'hapus_data_pemasok'])->name('hapus_data_pemasok');
    Route::post('developer/data_pemasok/simpan_data/{id}', [App\Http\Controllers\DataPemasokController::class, 'simpan_data_pemasok'])->name('simpan_data_pemasok');

    Route::get('developer/data_pembelian', [App\Http\Controllers\DataPembelianController::class, 'data_pembelian'])->name('data_pembelian');
    Route::post('developer/data_pembelian/tambah_data', [App\Http\Controllers\DataPembelianController::class, 'tambah_data_pembelian'])->name('tambah_data_pembelian');
    Route::get('developer/data_pembelian/ubah_data/{id}', [App\Http\Controllers\DataPembelianController::class, 'ubah_data_pembelian'])->name('ubah_data_pembelian');
    Route::get('developer/data_pembelian/hapus_data/{id_pembelian}', [App\Http\Controllers\DataPembelianController::class, 'hapus_data_pembelian'])->name('hapus_data_pembelian');
    Route::post('developer/data_pembelian/simpan_data/{id}', [App\Http\Controllers\DataPembelianController::class, 'simpan_data_pembelian'])->name('simpan_data_pembelian');

    Route::get('developer/data_kategori', [App\Http\Controllers\DataKategoriController::class, 'data_kategori'])->name('data_kategori');
    Route::post('developer/data_kategori/tambah_data', [App\Http\Controllers\DataKategoriController::class, 'tambah_data_kategori'])->name('tambah_data_kategori');
    Route::get('developer/data_kategori/ubah_data/{id}', [App\Http\Controllers\DataKategoriController::class, 'ubah_data_kategori'])->name('ubah_data_kategori');
    Route::get('developer/data_kategori/hapus_data/{id_kategori}', [App\Http\Controllers\DataKategoriController::class, 'hapus_data_kategori'])->name('hapus_data_kategori');
    Route::post('developer/data_kategori/simpan_data/{id}', [App\Http\Controllers\DataKategoriController::class, 'simpan_data_kategori'])->name('simpan_data_kategori');

    Route::get('developer/data_barang', [App\Http\Controllers\DataBarangController::class, 'data_barang'])->name('data_barang');
    Route::post('developer/data_barang/tambah_data', [App\Http\Controllers\DataBarangController::class, 'tambah_data_barang'])->name('tambah_data_barang');
    Route::get('developer/data_barang/ubah_data/{id}', [App\Http\Controllers\DataBarangController::class, 'ubah_data_barang'])->name('ubah_data_barang');
    Route::get('developer/data_barang/hapus_data/{id_barang}', [App\Http\Controllers\DataBarangController::class, 'hapus_data_barang'])->name('hapus_data_barang');
    Route::post('developer/data_barang/simpan_data/{id}', [App\Http\Controllers\DataBarangController::class, 'simpan_data_barang'])->name('simpan_data_barang');

    Route::get('developer/data_pesanan', [App\Http\Controllers\DataPesananController::class, 'data_pesanan'])->name('data_pesanan');

    Route::get('developer/data_payment', [App\Http\Controllers\DataPaymentController::class, 'data_payment'])->name('data_payment');
    Route::post('developer/data_payment/tambah_data', [App\Http\Controllers\DataPaymentController::class, 'tambah_data_payment'])->name('tambah_data_payment');
    Route::get('developer/data_payment/ubah_data/{id}', [App\Http\Controllers\DataPaymentController::class, 'ubah_data_payment'])->name('ubah_data_payment');
    Route::get('developer/data_payment/hapus_data/{id_payment}', [App\Http\Controllers\DataPaymentController::class, 'hapus_data_payment'])->name('hapus_data_payment');
    Route::post('developer/data_payment/simpan_data/{id}', [App\Http\Controllers\DataPaymentController::class, 'simpan_data_payment'])->name('simpan_data_payment');

    Route::get('developer/verifikasi_pembayaran', [App\Http\Controllers\DataPembayaranController::class, 'verifikasi_pembayaran'])->name('verifikasi_pembayaran');
    Route::get('developer/verifikasi_pembayaran/verif/{id_verif_bayar}', [App\Http\Controllers\DataPembayaranController::class, 'verif_bayar'])->name('verif_bayar');
    Route::get('developer/verifikasi_pembayaran/batal/{id_batal_bayar}', [App\Http\Controllers\DataPembayaranController::class, 'batal_verif'])->name('batal_verif');

    Route::get('developer/retur_penjualan', [App\Http\Controllers\ReturPenjualanController::class, 'retur_penjualan'])->name('retur_penjualan');
    Route::get('developer/terima_retur/{id_retur}', [App\Http\Controllers\ReturPenjualanController::class, 'terima_retur'])->name('terima_retur');

    Route::get('developer/laporan_penjualan', [App\Http\Controllers\DataLaporanController::class, 'laporan_penjualan'])->name('laporan_penjualan');
    Route::get('developer/laporan_pembelian', [App\Http\Controllers\DataLaporanController::class, 'laporan_pembelian'])->name('laporan_pembelian');
    Route::get('developer/laporan_persediaan', [App\Http\Controllers\DataLaporanController::class, 'laporan_persediaan'])->name('laporan_persediaan');
    Route::get('developer/daftar_pelanggan', [App\Http\Controllers\DataLaporanController::class, 'daftar_pelanggan'])->name('daftar_pelanggan');
    Route::get('developer/laporan_retur_penjualan', [App\Http\Controllers\DataLaporanController::class, 'laporan_retur_penjualan'])->name('laporan_retur_penjualan');

    Route::get('developer/accounts', [App\Http\Controllers\DataAccountController::class, 'accounts'])->name('accounts');
    Route::get('developer/edit_accounts/{id}', [App\Http\Controllers\DataAccountController::class, 'edit_accounts'])->name('edit_accounts');
    Route::post('developer/simpan_accounts/{id}', [App\Http\Controllers\DataAccountController::class, 'simpan_accounts'])->name('simpan_accounts');
    Route::get('developer/ubah_password', [App\Http\Controllers\DataAuthController::class, 'ubah_password'])->name('ubah_password');
    Route::put('developer/update_password', [App\Http\Controllers\DataAuthController::class, 'update_password'])->name('update_password');

    Route::get('developer/cetak_daftar_pelanggan', [App\Http\Controllers\DataCetakController::class, 'cetak_daftar_pelanggan'])->name('cetak_daftar_pelanggan');
    Route::get('developer/cetak_laporan_pembelian', [App\Http\Controllers\DataCetakController::class, 'cetak_laporan_pembelian'])->name('cetak_laporan_pembelian');
    Route::get('developer/cetak_laporan_penjualan', [App\Http\Controllers\DataCetakController::class, 'cetak_laporan_penjualan'])->name('cetak_laporan_penjualan');
    Route::get('developer/cetak_laporan_persediaan', [App\Http\Controllers\DataCetakController::class, 'cetak_laporan_persediaan'])->name('cetak_laporan_persediaan');
    Route::get('developer/cetak_retur_penjualan', [App\Http\Controllers\DataCetakController::class, 'cetak_retur_penjualan'])->name('cetak_retur_penjualan');
});

// Untuk Login Administrator
Route::group(['middleware' =>['auth','role:administrator']], function() {
    Route::get('administrator', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('administrator/data_pesanan', [App\Http\Controllers\DataPesananController::class, 'data_pesanan'])->name('data_pesanan');

    Route::get('administrator/retur_penjualan', [App\Http\Controllers\ReturPenjualanController::class, 'retur_penjualan'])->name('retur_penjualan');
    Route::get('administrator/terima_retur/{id_retur}', [App\Http\Controllers\ReturPenjualanController::class, 'terima_retur'])->name('terima_retur');

    Route::get('administrator/verifikasi_pembayaran', [App\Http\Controllers\DataPembayaranController::class, 'verifikasi_pembayaran'])->name('verifikasi_pembayaran');
    Route::get('administrator/verifikasi_pembayaran/verif/{id_verif_bayar}', [App\Http\Controllers\DataPembayaranController::class, 'verif_bayar'])->name('verif_bayar');
    Route::get('administrator/verifikasi_pembayaran/batal/{id_batal_bayar}', [App\Http\Controllers\DataPembayaranController::class, 'batal_verif'])->name('batal_verif');

    Route::get('administrator/laporan_penjualan', [App\Http\Controllers\DataLaporanController::class, 'laporan_penjualan'])->name('laporan_penjualan');
    Route::get('administrator/laporan_persediaan', [App\Http\Controllers\DataLaporanController::class, 'laporan_persediaan'])->name('laporan_persediaan');
    Route::get('administrator/laporan_retur_penjualan', [App\Http\Controllers\DataLaporanController::class, 'laporan_retur_penjualan'])->name('laporan_retur_penjualan');

    Route::get('administrator/cetak_laporan_penjualan', [App\Http\Controllers\DataCetakController::class, 'cetak_laporan_penjualan'])->name('cetak_laporan_penjualan');
    Route::get('administrator/cetak_laporan_persediaan', [App\Http\Controllers\DataCetakController::class, 'cetak_laporan_persediaan'])->name('cetak_laporan_persediaan');
    Route::get('administrator/cetak_retur_penjualan', [App\Http\Controllers\DataCetakController::class, 'cetak_retur_penjualan'])->name('cetak_retur_penjualan');

    Route::get('administrator/accounts', [App\Http\Controllers\DataAccountController::class, 'accounts'])->name('accounts');
    Route::get('administrator/edit_accounts/{id}', [App\Http\Controllers\DataAccountController::class, 'edit_accounts'])->name('edit_accounts');
    Route::post('administrator/simpan_accounts/{id}', [App\Http\Controllers\DataAccountController::class, 'simpan_accounts'])->name('simpan_accounts');
    Route::get('administrator/ubah_password', [App\Http\Controllers\DataAuthController::class, 'ubah_password'])->name('ubah_password');
    Route::put('administrator/update_password', [App\Http\Controllers\DataAuthController::class, 'update_password'])->name('update_password');
});

// Untuk Login User
Route::group(['middleware' =>['auth', 'role:user']], function() {

    // Halaman Beranda (Awal)
    Route::get('home', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    Route::get('home/detail/{id}', [App\Http\Controllers\FirstPagesController::class, 'detail_index'])->name('detail_index');

    // Halaman Bahan Pokok dan Bumbu Dapur
    Route::get('home/bahan_pokok', [App\Http\Controllers\FirstPagesController::class, 'bahan_pokok'])->name('bahan_pokok');
    Route::get('home/bahan_pokok/detail/{id}', [App\Http\Controllers\FirstPagesController::class, 'detail_bahan_pokok'])->name('detail_bahan_pokok');

    // Halaman Makanan Instan
    Route::get('home/makanan_instan', [App\Http\Controllers\FirstPagesController::class, 'makanan_instan'])->name('makanan_instan');
    Route::get('home/makanan_instan/detail/{id}', [App\Http\Controllers\FirstPagesController::class, 'detail_makanan_instan'])->name('detail_makanan_instan');

    // Halaman Makanan Ringan
    Route::get('home/makanan_ringan', [App\Http\Controllers\FirstPagesController::class, 'makanan_ringan'])->name('makanan_ringan');
    Route::get('home/makanan_ringan/detail/{id}', [App\Http\Controllers\FirstPagesController::class, 'detail_makanan_ringan'])->name('detail_makanan_ringan');

    // Halaman Minuman
    Route::get('home/minuman', [App\Http\Controllers\FirstPagesController::class, 'minuman'])->name('minuman');
    Route::get('home/minuman/detail/{id}', [App\Http\Controllers\FirstPagesController::class, 'detail_minuman'])->name('detail_minuman');

    // Halaman Kebersihan Rumah
    Route::get('home/kebersihan_rumah', [App\Http\Controllers\FirstPagesController::class, 'kebersihan_rumah'])->name('kebersihan_rumah');
    Route::get('home/kebersihan_rumah/detail/{id}', [App\Http\Controllers\FirstPagesController::class, 'detail_kebersihan_rumah'])->name('detail_kebersihan_rumah');

    // Halaman Perawatan Tubuh
    Route::get('home/perawatan_tubuh', [App\Http\Controllers\FirstPagesController::class, 'perawatan_tubuh'])->name('perawatan_tubuh');
    Route::get('home/perawatan_tubuh/detail/{id}', [App\Http\Controllers\FirstPagesController::class, 'detail_perawatan_tubuh'])->name('detail_perawatan_tubuh');

    // Halaman Perawatan Rambut
    Route::get('home/perawatan_rambut', [App\Http\Controllers\FirstPagesController::class, 'perawatan_rambut'])->name('perawatan_rambut');
    Route::get('home/perawatan_rambut/detail/{id}', [App\Http\Controllers\FirstPagesController::class, 'detail_perawatan_rambut'])->name('detail_perawatan_rambut');

    // Halaman Pembayaran
    Route::get('home/pembayaran_pesanan/{id}', [App\Http\Controllers\PagesPembayaranController::class, 'pembayaran_pesanan'])->name('pembayaran_pesanan');
    Route::post('home/submit_pembayaran/{id_pembayaran}', [App\Http\Controllers\PagesPembayaranController::class, 'submit_pembayaran'])->name('submit_pembayaran');
    
    // Halaman Pesanan
    Route::get('home/status_pesanan', [App\Http\Controllers\PagesPesananController::class, 'status_pesanan'])->name('status_pesanan');
    Route::get('home/status_pesanan/detail/{id}', [App\Http\Controllers\PagesPesananController::class, 'detail_status_pesanan'])->name('detail_status_pesanan');
    Route::get('home/confirm_terima_pesanan/{id_pesanan}', [App\Http\Controllers\PagesPesananController::class, 'confirm_terima_pesanan'])->name('confirm_terima_pesanan');
    
    // Halaman Beli Sekarang
    Route::post('home/beli_sekarang/checkout/{id}', [App\Http\Controllers\PagesBeliSekarangController::class, 'checkout'])->name('checkout');
    Route::post('home/beli_sekarang/check_ongkir', [App\Http\Controllers\PagesBeliSekarangController::class, 'processShipping'])->name('processShipping');
    Route::post('home/beli_sekarang/submit', [App\Http\Controllers\PagesBeliSekarangController::class, 'submit_checkout2'])->name('submit_checkout2');

    // Halaman Checkout
    Route::post('home/check_ongkir', [App\Http\Controllers\PagesCheckoutController::class, 'processShipping'])->name('processShipping');
    Route::get('home/checkout', [App\Http\Controllers\PagesCheckoutController::class, 'checkout'])->name('checkout');
    Route::post('home/submit_checkout', [App\Http\Controllers\PagesCheckoutController::class, 'submit_checkout'])->name('submit_checkout');
    
    // Halaman Keranjang
    Route::get('home/keranjang', [App\Http\Controllers\PagesKeranjangController::class, 'keranjang'])->name('keranjang');
    Route::post('home/tambah_keranjang/{id}', [App\Http\Controllers\PagesKeranjangController::class, 'tambah_keranjang'])->name('tambah_keranjang');
    Route::get('home/hapus_keranjang/{id_keranjang}', [App\Http\Controllers\PagesKeranjangController::class, 'hapus_keranjang'])->name('hapus_keranjang');

    // Halaman My Profile
    Route::get('home/accounts', [App\Http\Controllers\PagesAccountController::class, 'accounts'])->name('accounts');
    Route::get('home/edit_accounts/{id}', [App\Http\Controllers\PagesAccountController::class, 'edit_accounts'])->name('edit_accounts');
    Route::post('home/simpan_accounts/{id}', [App\Http\Controllers\PagesAccountController::class, 'simpan_accounts'])->name('simpan_accounts');
    Route::get('home/ubah_password', [App\Http\Controllers\PagesAuthController::class, 'ubah_password'])->name('ubah_password');
    Route::put('home/update_password', [App\Http\Controllers\PagesAuthController::class, 'update_password'])->name('update_password');

    // API Ongkos Kirim
    Route::get('home/getprovince', [App\Http\Controllers\OngkirAPIController::class, 'getprovince'])->name('getprovince');
    Route::get('home/getcity', [App\Http\Controllers\OngkirAPIController::class, 'getcity'])->name('getcity');
    Route::get('home/checkshipping', [App\Http\Controllers\OngkirAPIController::class, 'checkshipping'])->name('checkshipping');
    Route::get('home/processShipping', [App\Http\Controllers\OngkirAPIController::class, 'processShipping'])->name('processShipping');

    // Halaman Retur Pesanan
    Route::get('home/retur_pesanan/{id_pesanan}', [App\Http\Controllers\PagesReturPesananController::class, 'retur_pesanan'])->name('retur_pesanan');
    Route::post('home/ajukan_retur_pesanan', [App\Http\Controllers\PagesReturPesananController::class, 'tambah_retur'])->name('tambah_retur');

    // Ulasan Komentar
    Route::post('home/tambah_ulasan', [App\Http\Controllers\FirstPagesController::class, 'tambah_ulasan'])->name('tambah_ulasan');
});

Route::group(['middleware' =>['auth','role:pimpinan']], function() {
    Route::get('pimpinan', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('pimpinan/laporan_penjualan', [App\Http\Controllers\DataLaporanController::class, 'laporan_penjualan'])->name('laporan_penjualan');
    Route::get('pimpinan/laporan_pembelian', [App\Http\Controllers\DataLaporanController::class, 'laporan_pembelian'])->name('laporan_pembelian');
    Route::get('pimpinan/laporan_persediaan', [App\Http\Controllers\DataLaporanController::class, 'laporan_persediaan'])->name('laporan_persediaan');
    Route::get('pimpinan/daftar_pelanggan', [App\Http\Controllers\DataLaporanController::class, 'daftar_pelanggan'])->name('daftar_pelanggan');
    Route::get('pimpinan/laporan_retur_penjualan', [App\Http\Controllers\DataLaporanController::class, 'laporan_retur_penjualan'])->name('laporan_retur_penjualan');

    Route::get('pimpinan/accounts', [App\Http\Controllers\DataAccountController::class, 'accounts'])->name('accounts');
    Route::get('pimpinan/edit_accounts/{id}', [App\Http\Controllers\DataAccountController::class, 'edit_accounts'])->name('edit_accounts');
    Route::post('pimpinan/simpan_accounts/{id}', [App\Http\Controllers\DataAccountController::class, 'simpan_accounts'])->name('simpan_accounts');
    Route::get('pimpinan/ubah_password', [App\Http\Controllers\DataAuthController::class, 'ubah_password'])->name('ubah_password');
    Route::put('pimpinan/update_password', [App\Http\Controllers\DataAuthController::class, 'update_password'])->name('update_password');

    Route::get('pimpinan/cetak_daftar_pelanggan', [App\Http\Controllers\DataCetakController::class, 'cetak_daftar_pelanggan'])->name('cetak_daftar_pelanggan');
    Route::get('pimpinan/cetak_laporan_pembelian', [App\Http\Controllers\DataCetakController::class, 'cetak_laporan_pembelian'])->name('cetak_laporan_pembelian');
    Route::get('pimpinan/cetak_laporan_penjualan', [App\Http\Controllers\DataCetakController::class, 'cetak_laporan_penjualan'])->name('cetak_laporan_penjualan');
    Route::get('pimpinan/cetak_laporan_persediaan', [App\Http\Controllers\DataCetakController::class, 'cetak_laporan_persediaan'])->name('cetak_laporan_persediaan');
    Route::get('pimpinan/cetak_retur_penjualan', [App\Http\Controllers\DataCetakController::class, 'cetak_retur_penjualan'])->name('cetak_retur_penjualan');
});

Route::group(['middleware' =>['auth','role:storage']], function() {
    Route::get('storage', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('storage/data_pemasok', [App\Http\Controllers\DataPemasokController::class, 'data_pemasok'])->name('data_pemasok');
    Route::post('storage/data_pemasok/tambah_data', [App\Http\Controllers\DataPemasokController::class, 'tambah_data_pemasok'])->name('tambah_data_pemasok');
    Route::get('storage/data_pemasok/ubah_data/{id}', [App\Http\Controllers\DataPemasokController::class, 'ubah_data_pemasok'])->name('ubah_data_pemasok');
    Route::get('storage/data_pemasok/hapus_data/{id_pemasok}', [App\Http\Controllers\DataPemasokController::class, 'hapus_data_pemasok'])->name('hapus_data_pemasok');
    Route::post('storage/data_pemasok/simpan_data/{id}', [App\Http\Controllers\DataPemasokController::class, 'simpan_data_pemasok'])->name('simpan_data_pemasok');

    Route::get('storage/data_kategori', [App\Http\Controllers\DataKategoriController::class, 'data_kategori'])->name('data_kategori');
    Route::post('storage/data_kategori/tambah_data', [App\Http\Controllers\DataKategoriController::class, 'tambah_data_kategori'])->name('tambah_data_kategori');
    Route::get('storage/data_kategori/ubah_data/{id}', [App\Http\Controllers\DataKategoriController::class, 'ubah_data_kategori'])->name('ubah_data_kategori');
    Route::get('storage/data_kategori/hapus_data/{id_kategori}', [App\Http\Controllers\DataKategoriController::class, 'hapus_data_kategori'])->name('hapus_data_kategori');
    Route::post('storage/data_kategori/simpan_data/{id}', [App\Http\Controllers\DataKategoriController::class, 'simpan_data_kategori'])->name('simpan_data_kategori');

    Route::get('storage/data_barang', [App\Http\Controllers\DataBarangController::class, 'data_barang'])->name('data_barang');
    Route::post('storage/data_barang/tambah_data', [App\Http\Controllers\DataBarangController::class, 'tambah_data_barang'])->name('tambah_data_barang');
    Route::get('storage/data_barang/ubah_data/{id}', [App\Http\Controllers\DataBarangController::class, 'ubah_data_barang'])->name('ubah_data_barang');
    Route::get('storage/data_barang/hapus_data/{id_barang}', [App\Http\Controllers\DataBarangController::class, 'hapus_data_barang'])->name('hapus_data_barang');
    Route::post('storage/data_barang/simpan_data/{id}', [App\Http\Controllers\DataBarangController::class, 'simpan_data_barang'])->name('simpan_data_barang');

    Route::get('storage/data_pembelian', [App\Http\Controllers\DataPembelianController::class, 'data_pembelian'])->name('data_pembelian');
    Route::post('storage/data_pembelian/tambah_data', [App\Http\Controllers\DataPembelianController::class, 'tambah_data_pembelian'])->name('tambah_data_pembelian');
    Route::get('storage/data_pembelian/ubah_data/{id}', [App\Http\Controllers\DataPembelianController::class, 'ubah_data_pembelian'])->name('ubah_data_pembelian');
    Route::get('storage/data_pembelian/hapus_data/{id_pembelian}', [App\Http\Controllers\DataPembelianController::class, 'hapus_data_pembelian'])->name('hapus_data_pembelian');
    Route::post('storage/data_pembelian/simpan_data/{id}', [App\Http\Controllers\DataPembelianController::class, 'simpan_data_pembelian'])->name('simpan_data_pembelian');

    Route::get('storage/laporan_persediaan', [App\Http\Controllers\DataLaporanController::class, 'laporan_persediaan'])->name('laporan_persediaan');

    Route::get('storage/cetak_laporan_persediaan', [App\Http\Controllers\DataCetakController::class, 'cetak_laporan_persediaan'])->name('cetak_laporan_persediaan');

    Route::get('storage/accounts', [App\Http\Controllers\DataAccountController::class, 'accounts'])->name('accounts');
    Route::get('storage/edit_accounts/{id}', [App\Http\Controllers\DataAccountController::class, 'edit_accounts'])->name('edit_accounts');
    Route::post('storage/simpan_accounts/{id}', [App\Http\Controllers\DataAccountController::class, 'simpan_accounts'])->name('simpan_accounts');
    Route::get('storage/ubah_password', [App\Http\Controllers\DataAuthController::class, 'ubah_password'])->name('ubah_password');
    Route::put('storage/update_password', [App\Http\Controllers\DataAuthController::class, 'update_password'])->name('update_password');
});

require __DIR__.'/auth.php';