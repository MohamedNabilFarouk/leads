<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Leave_setting_config extends Model
{
    use HasFactory,UsesTenantConnection;

    protected  $fillable = ['leave_name','common_value','carry_forward','earned_leave','custom_policy','gender'];

    public function leave(){
        return $this->hasOne('\App\Models\Leave_setting','leave_setting_id','id');
    }

}
