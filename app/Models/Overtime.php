<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Overtime extends Model
{
    use HasFactory,UsesTenantConnection;
    protected $fillable=[
        'user_id',
        'overtime_date',
        'overtime_time',
        'overtime_type',
        'overtime_description',
        'overtime_approve_by',
        'created_by'

    ];

    public function user(){
        return $this->belongsTo('\App\Models\User','user_id');
    }
    public function type(){
        return $this->belongsTo('\App\Models\Overtime_type','overtime_type');
    }
    public function approve(){
        return $this->belongsTo('\App\Models\User','overtime_approve_by');
    }
    public function createdBy(){
        return $this->belongsTo('\App\Models\User','created_by');
    }

}
