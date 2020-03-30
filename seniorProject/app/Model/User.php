<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "users";
    
    public function users_roles()
    {
        return $this->hasMany(UserRole::class,'internal_user_id');
    }
}
