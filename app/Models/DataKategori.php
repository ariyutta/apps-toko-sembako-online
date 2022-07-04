<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKategori extends Model
{
    use HasFactory;
    protected $table = 'data_kategori';
    protected $primarykey = 'id';
    protected $guarded = [];

    public function barang() {
        return $this->hasOne(DataBarang::class, 'id', 'kategori_id');
    }
}
