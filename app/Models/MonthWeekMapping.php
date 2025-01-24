<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthWeekMapping extends Model
{
    use HasFactory;

    protected $fillable = [
    'month','status',
    'w1_start','w1_end',
    'w2_start','w2_end',
    'w3_start','w3_end',
    'w4_start','w4_end',
    'w5_start','w5_end',
    ];
}
