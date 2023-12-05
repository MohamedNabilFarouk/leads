<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Leaves extends Model
{
    use HasFactory,UsesTenantConnection;
    protected $fillable = [
        'leave_type_id',
        'period_from',
        'period_to',
        'work_Resume',
        'dedcut_annual_vacation',
        'ticket_charges',
        'visa_needed',
        'leave_sattus',
        'leave_adress',
        'mobile_number',
        'leave_reason',
        'employee_replacement',
        'amount',
        'salary_transportation',
        'cost_center',
        'user_id',
        'approve_leave_status',
        'approve_by',
        'prescription'
    ];

    public function user(){
        return $this->belongsTo('\App\Models\User','user_id');
    }

    public function replacement(){
        return $this->belongsTo('\App\Models\User','employee_replacement');
    }

    public function type(){
        return $this->belongsTo('\App\Models\Leave_type','leave_type_id');
    }

}
