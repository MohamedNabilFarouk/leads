<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Leave_setting extends Model
{
    use HasFactory,UsesTenantConnection;
    protected $fillable = [
        'leave_setting_id',
        'days',
        'carry_forward',
        'carry_forward_days',
         'earned_leave'
          ];



}
