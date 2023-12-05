<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Designations extends Model
{
    use HasFactory,UsesTenantConnection;
    protected $fillable = [
        'name',
        'department_id'
    ];
    public function department(){
        return $this->belongsTo('\App\Models\Department','department_id','id');
    }
}
