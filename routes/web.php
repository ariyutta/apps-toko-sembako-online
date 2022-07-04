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

// Untuk Developer Login
Route::group(['middleware' =>['auth']], function() {
    Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('dashboard/admins/data_pemasok', [App\Http\Controllers\DataPemasokController::class, 'data_pemasok'])->name('data_pemasok');
    Route::post('dashboard/admins/data_pemasok/tambah_data', [App\Http\Controllers\DataPemasokController::class, 'tambah_data_pemasok'])->name('tambah_data_pemasok');
    Route::get('dashboard/admins/data_pemasok/ubah_data/{id}', [App\Http\Controllers\DataPemasokController::class, 'ubah_data_pemasok'])->name('ubah_data_pemasok');
    Route::get('dashboard/admins/data_pemasok/hapus_data/{id_pemasok}', [App\Http\Controllers\DataPemasokController::class, 'hapus_data_pemasok'])->name('hapus_data_pemasok');
    Route::post('dashboard/admins/data_pemasok/simpan_data/{id}', [App\Http\Controllers\DataPemasokController::class, 'simpan_data_pemasok'])->name('simpan_data_pemasok');

    Route::get('dashboard/admins/data_kategori', [App\Http\Controllers\DataKategoriController::class, 'data_kategori'])->name('data_kategori');
    Route::post('dashboard/admins/data_kategori/tambah_data', [App\Http\Controllers\DataKategoriController::class, 'tambah_data_kategori'])->name('tambah_data_kategori');
    Route::get('dashboard/admins/data_kategori/ubah_data/{id}', [App\Http\Controllers\DataKategoriController::class, 'ubah_data_kategori'])->name('ubah_data_kategori');
    Route::get('dashboard/admins/data_kategori/hapus_data/{id_kategori}', [App\Http\Controllers\DataKategoriController::class, 'hapus_data_kategori'])->name('hapus_data_kategori');
    Route::post('dashboard/admins/data_kategori/simpan_data/{id}', [App\Http\Controllers\DataKategoriController::class, 'simpan_data_kategori'])->name('simpan_data_kategori');

    Route::get('dashboard/admins/data_barang', [App\Http\Controllers\DataBarangController::class, 'data_barang'])->name('data_barang');
    Route::post('dashboard/admins/data_barang/tambah_data', [App\Http\Controllers\DataBarangController::class, 'tambah_data_barang'])->name('tambah_data_barang');
    Route::get('dashboard/admins/data_barang/ubah_data/{id}', [App\Http\Controllers\DataBarangController::class, 'ubah_data_barang'])->name('ubah_data_barang');
    Route::get('dashboard/admins/data_barang/hapus_data/{id_barang}', [App\Http\Controllers\DataBarangController::class, 'hapus_data_barang'])->name('hapus_data_barang');
    Route::post('dashboard/admins/data_barang/simpan_data/{id}', [App\Http\Controllers\DataBarangController::class, 'simpan_data_barang'])->name('simpan_data_barang');

    Route::get('dashboard/admins/data_pesanan', [App\Http\Controllers\DataPesananController::class, 'data_pesanan'])->name('data_pesanan');

    Route::get('dashboard/admins/verifikasi_pembayaran', [App\Http\Controllers\HomeController::class, 'verifikasi_pembayaran'])->name('verifikasi_pembayaran');

    Route::get('dashboard/admins/laporan', [App\Http\Controllers\HomeController::class, 'laporan'])->name('laporan');
});

// Untuk Administrator Login
Route::group(['middleware' =>['auth','role:administrator']], function() {
    Route::get('/dashboard/admins', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
});

// Untuk User Login
Route::group(['middleware' =>['auth', 'role:user']], function() {
    Route::get('/dashboard/users', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

    Route::get('dashboard/detail/{id}', [App\Http\Controllers\FirstPagesController::class, 'detail_index'])->name('detail_index');
    Route::get('dashboard/bahan_pokok', [App\Http\Controllers\FirstPagesController::class, 'bahan_pokok'])->name('bahan_pokok');
    Route::get('dashboard/bahan_pokok/detail/{id}', [App\Http\Controllers\FirstPagesController::class, 'detail_bahan_pokok'])->name('detail_bahan_pokok');
    Route::get('dashboard/makanan_instan', [App\Http\Controllers\FirstPagesController::class, 'makanan_instan'])->name('makanan_instan');
    Route::get('dashboard/makanan_instan/detail/{id}', [App\Http\Controllers\FirstPagesController::class, 'detail_makanan_instan'])->name('detail_makanan_instan');
    Route::get('dashboard/makanan_ringan', [App\Http\Controllers\FirstPagesController::class, 'makanan_ringan'])->name('makanan_ringan');
    Route::get('dashboard/makanan_ringan/detail/{id}', [App\Http\Controllers\FirstPagesController::class, 'detail_makanan_ringan'])->name('detail_makanan_ringan');
    Route::get('dashboard/minuman', [App\Http\Controllers\FirstPagesController::class, 'minuman'])->name('minuman');
    Route::get('dashboard/minuman/detail/{id}', [App\Http\Controllers\FirstPagesController::class, 'detail_minuman'])->name('detail_minuman');
    Route::get('dashboard/kebersihan_rumah', [App\Http\Controllers\FirstPagesController::class, 'kebersihan_rumah'])->name('kebersihan_rumah');
    Route::get('dashboard/kebersihan_rumah/detail/{id}', [App\Http\Controllers\FirstPagesController::class, 'detail_kebersihan_rumah'])->name('detail_kebersihan_rumah');
    Route::get('dashboard/perawatan_tubuh', [App\Http\Controllers\FirstPagesController::class, 'perawatan_tubuh'])->name('perawatan_tubuh');
    Route::get('dashboard/perawatan_tubuh/detail/{id}', [App\Http\Controllers\FirstPagesController::class, 'detail_perawatan_tubuh'])->name('detail_perawatan_tubuh');
    Route::get('dashboard/perawatan_rambut', [App\Http\Controllers\FirstPagesController::class, 'perawatan_rambut'])->name('perawatan_rambut');
    Route::get('dashboard/perawatan_rambut/detail{id}', [App\Http\Controllers\FirstPagesController::class, 'detail_perawatan_rambut'])->name('detail_perawatan_rambut');
    Route::get('dashboard/keranjang', [App\Http\Controllers\FirstPagesController::class, 'keranjang'])->name('keranjang');
    Route::get('dashboard/checkout', [App\Http\Controllers\FirstPagesController::class, 'checkout'])->name('checkout');
    Route::get('dashboard/pembayaran_pesanan', [App\Http\Controllers\FirstPagesController::class, 'pembayaran_pesanan'])->name('pembayaran_pesanan');
    Route::get('dashboard/status_pesanan', [App\Http\Controllers\FirstPagesController::class, 'status_pesanan'])->name('status_pesanan');
    Route::get('dashboard/konfirmasi_pesanan', [App\Http\Controllers\FirstPagesController::class, 'konfirmasi_pesanan'])->name('konfirmasi_pesanan');
    Route::get('dashboard/submit_pembayaran', [App\Http\Controllers\FirstPagesController::class, 'submit_pembayaran'])->name('submit_pembayaran');
    Route::get('dashboard/submit_checkout', [App\Http\Controllers\FirstPagesController::class, 'submit_checkout'])->name('submit_checkout');

    Route::post('dashboard/tambah_keranjang/{id}', [App\Http\Controllers\FirstPagesController::class, 'tambah_keranjang'])->name('tambah_keranjang');
    Route::get('dashboard/hapus_keranjang/{id_keranjang}', [App\Http\Controllers\FirstPagesController::class, 'hapus_keranjang'])->name('hapus_keranjang');
});

require __DIR__.'/auth.php';