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
}
