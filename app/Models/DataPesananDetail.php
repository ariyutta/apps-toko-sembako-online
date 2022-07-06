<?php

namespace App\Models;

use App\Models\DataPesanan as ModelsDataPesanan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPesananDetail extends Model
{
    use HasFactory;
    protected $table = 'data_pesanan_detail';
    protected $primarykey = 'id';
    protected $guarded = [];

    public function barang() {
        return $this->belongsTo(DataBarang::class, 'barang_id', 'id');
    }

    public function pesanan() {
        return $this->belongsTo(DataPesanan::class, 'pesanan_id', 'id');
    }
}
