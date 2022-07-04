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
}
