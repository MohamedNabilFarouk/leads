<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activites extends Model
{
    use HasFactory;

    protected $fillable = [
        'page_name',
        'description',
        'description_ar',
        'status',
        'link'

    ];
}