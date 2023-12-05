<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
        protected $fillable = [
            'company_name',
            'location',
            'job_position',
            'period_form',
            'period_to',
            'user_id'
        ];
   
}
