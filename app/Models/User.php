<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laratrust\Traits\LaratrustUserTrait;
// use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasApiTokens, HasFactory, Notifiable;
    // use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role_user() {
        return $this->hasOne(RoleUser::class, 'user_id');
    }

    public function keranjang() {
        return $this->hasOne(DataKeranjang::class, 'user_id');
    }

    public function pesanan() {
        return $this->hasMany(DataPesanan::class, 'user_id','id');
    }

    public function agama() {
        return $this->belongsTo(DataAgama::class, 'agama_id', 'id');
    }

    public function pekerjaan() {
        return $this->belongsTo(DataPekerjaan::class, 'pekerjaan_id', 'id');
    }

    public function retur_penjualan() {
        return $this->hasMany(ReturPenjualan::class, 'id','user_id');
    }

    public function ulasan() {
        return $this->hasOne(DataUlasan::class, 'id','user_id');
    }
}