<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Overtime_type extends Model
{
    use HasFactory;
    protected $fillable=[
        'overtime_type_title','overtime_value'
    ];
}
