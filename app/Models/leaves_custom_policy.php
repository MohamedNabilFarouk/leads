<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class leaves_custom_policy extends Model
{
    use HasFactory;

    protected $fillable = [
        'setting_id','policy_name','policy_days'
    ];

    public function user_leaves_custom_policies(){
        return $this->belongsTo('\App\Models\User_leaves_custom_policy','policy_id');
    }
    public function leave_settings(){
        return $this->belongsTo('\App\Models\Leave_setting','setting_id');
    }
    public function type(){
        return $this->belongsTo('\App\Models\Leave_type','leave_setting_id');
    }



}
