<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education_information extends Model
{
    use HasFactory;

    protected $fillable = [
        'institution',
        'subject',
        'starting_date',
        'complete_date',
        'degree',
        'grade',
        'user_id'
    ];

}
