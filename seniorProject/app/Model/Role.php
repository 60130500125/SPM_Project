<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    public function users_roles()
    {
        return $this->hasMany(UserRole::class,'internal_role_id');
    }
}
