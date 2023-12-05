<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class User_leaves_custom_policy extends Model
{
    use HasFactory,UsesTenantConnection;
    protected $fillable = [
        'policy_id','user_id'
    ];
    public function leaves_custom_policy(){
        return $this->belongsTo('\App\Models\leaves_custom_policy','policy_id');
    }

    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
}
