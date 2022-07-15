<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturPenjualan extends Model
{
    use HasFactory;
    protected $table = 'retur_penjualan';
    protected $primarykey = 'id';
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function pesanan() {
        return $this->belongsTo(DataPesanan::class, 'pesanan_id','id');
    }
}
