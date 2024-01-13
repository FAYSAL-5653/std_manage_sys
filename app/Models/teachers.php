<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teachers extends Model
{
    use HasFactory;
    protected $fillable = [
        'teacher_name',
        'image',
        'designation',
        'phone',

    ];
}
