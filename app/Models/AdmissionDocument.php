<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdmissionDocument extends Model
{
    use HasFactory;


    protected $fillable = [
        'filled_form',
        'aadhaar',
        'leaving_certificate',
        'birth_certificate',
    ];
}
