<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Loan extends Model
{
    use HasFactory,UsesTenantConnection;
protected $guard=[];



public function user(){
    return $this->belongsTo(User::Class,'user_id');
}

public function warrantors(){
    return $this->belongsTo(User::Class,'warrantor');
}

}
