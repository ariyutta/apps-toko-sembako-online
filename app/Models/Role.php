<?php

namespace App\Models;

use Laratrust\Models\LaratrustRole;

class Role extends LaratrustRole
{
    protected $table = 'roles';
    protected $primarykey = 'id';
    protected $guarded = [];

    public function role_user() {
        return $this->hasOne(RoleUser::class, 'id', 'role_id');
    }
}
