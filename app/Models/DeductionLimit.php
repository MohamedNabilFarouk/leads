<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeductionLimit extends Model
{
    use HasFactory;
    protected $fillable=['user_id','date','deduction_type','deduction_count','amount','type','status','reason','minutes'];
    public function user(){
        return $this->belongsTo('\App\Models\User','user_id');
    }
}

