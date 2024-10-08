<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPemasok extends Model
{
    use HasFactory;
    protected $table = 'data_pemasok';
    protected $primarykey = 'id';
    protected $guarded = [];

    public function barang() {
        return $this->hasOne(DataBarang::class, 'id', 'pemasok_id');
    }

    public function pembelian() {
        return $this->hasOne(DataPembelian::class, 'id', 'pemasok_id');
    }
}
