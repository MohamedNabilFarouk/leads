<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Department extends Model
{
    use HasFactory,UsesTenantConnection;
    protected $fillable = [
        'name',
        'name_ar'
    ];
}
