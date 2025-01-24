<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class SixUser extends Model
{
    use HasFactory;

    public function getUserData()
    {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function getRoleData()
    {
        return $this->hasOne(Role::class,'id','role_id');
    }
}
