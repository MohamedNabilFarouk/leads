<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttendanceType extends Model
{
    use HasFactory;
    protected $table = 'attendance_types';

    protected $fillable = [
        'title_ar',
        'title_en',
        'abbreviation'
    ];
}
