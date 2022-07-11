<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBarang extends Model
{
    use HasFactory;
    protected $table = 'data_barang';
    protected $primarykey = 'id';
    protected $guarded = [];

    public function kategori() {
        return $this->belongsTo(DataKategori::class, 'kategori_id', 'id');
    }

    public function keranjang() {
        return $this->hasOne(DataKeranjang::class, 'id', 'barang_id');
    }

    public function pesanan_detail() {
        return $this->hasMany(DataPesananDetail::class, 'barang_id', 'id');
    }

    public function pemasok() {
        return $this->belongsTo(DataPemasok::class, 'pemasok_id', 'id');
    }
}
