<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataUlasan extends Model
{
    use HasFactory;
    protected $table = 'data_ulasan';
    protected $primarykey = 'id';
    protected $guarded = [];

    public function user() {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function barang() {
        return $this->belongsTo(DataBarang::class, 'barang_id','id');
    }
}
