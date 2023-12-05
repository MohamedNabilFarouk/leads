<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class WorkSheet extends Model
{
    use HasFactory,UsesTenantConnection;
    protected $table = 'work_sheet';

    protected $fillable = [
        'employee_id',
        'attendance_type',
        'shift_from',
        'shift_to'
    ];

    public function user(){
        return $this->belongsTo('\App\Models\User','employee_id');
    }
}
