<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataAgama extends Model
{
    use HasFactory;
    protected $table = 'data_agama';
    protected $primarykey = 'id';
    protected $guarded = [];

    public function user() {
        return $this->hasOne(User::class, 'id', 'agama_id');
    }
}
