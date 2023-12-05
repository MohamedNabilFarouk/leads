<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave_policy extends Model
{
    use HasFactory;
    protected $fillable = [
        'policy_name',
        'policy_days',
        'policy_type',
        'user_id'
    ];
}
