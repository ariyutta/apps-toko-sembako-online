<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPekerjaan extends Model
{
    use HasFactory;
    protected $table = 'data_pekerjaan';
    protected $primarykey = 'id';
    protected $guarded = [];

    public function user() {
        return $this->hasOne(User::class, 'id', 'pekerjaan_id');
    }
}
