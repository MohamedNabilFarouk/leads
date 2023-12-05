<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Family_information extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'relationship',
        'phone',
        'date_birth',
        'user_id'
    ];
}
