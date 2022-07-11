<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPayment extends Model
{
    use HasFactory;
    protected $table = 'data_payment';
    protected $primarykey = 'id';
    protected $guarded = [];

    public function pesanan() {
        return $this->hasOne(DataPesanan::class, 'id', 'jenis_pembayaran_id');
    }
}
