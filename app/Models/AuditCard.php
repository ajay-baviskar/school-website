<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditCard extends Model
{
    use HasFactory;

    public function getAuditorData()
    {
        return $this->hasOne(User::class,'id','auditor_user_id');
    }

    public function getChampData()
    {
        return $this->hasOne(User::class,'id','champion_user_id');
    }
}
