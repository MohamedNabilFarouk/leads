<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Termination extends Model
{
    use HasFactory;

    protected $fillable = [
        'terminated_employee','termination_type','termination_date','reason','notice_date'
    ];
    public function user(){
        return $this->belongsTo('\App\Models\User','terminated_employee');
    }
    public function type(){
        return $this->belongsTo('\App\Models\TerminationType','termination_type');
    }
}
