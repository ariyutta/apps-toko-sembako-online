<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPesanan extends Model
{
    use HasFactory;
    protected $table = 'data_pesanan';
    protected $primarykey = 'id';
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function pesanan_detail() {
        return $this->hasMany(DataPesananDetail::class, 'pesanan_id', 'id');
    }

    public function payment() {
        return $this->belongsTo(DataPayment::class, 'jenis_pembayaran_id', 'id');
    }

    public function retur_penjualan() {
        return $this->hasOne(ReturPenjualan::class, 'pesanan_id');
    }
}
