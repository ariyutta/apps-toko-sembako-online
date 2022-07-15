<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPembelian extends Model
{
    use HasFactory;
    protected $table = 'data_pembelian';
    protected $primarykey = 'id';
    protected $guarded = [];

    public function barang() {
        return $this->belongsTo(DataBarang::class, 'barang_id', 'id');
    }

    public function pemasok() {
        return $this->belongsTo(DataPemasok::class, 'pemasok_id', 'id');
    }
}
