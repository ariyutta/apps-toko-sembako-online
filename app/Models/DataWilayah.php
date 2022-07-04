<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataWilayah extends Model
{
    use HasFactory;
    protected $table = 'data_wilayah';
    protected $primarykey = 'id';
    protected $guarded = [];

    // public function keranjang() {
    //     return $this->hasOne(DataKeranjang::class, 'user_id');
    // }
}
