<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'course',
        'gender',
        'date_of_birth',
        'address',
        'status',
    ];
}
