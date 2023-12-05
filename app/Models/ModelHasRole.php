<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;
class ModelHasRole extends Model
{
    use HasFactory,UsesTenantConnection;
    public $timestamps = false;
    protected $fillable=['role_id','model_type','model_id'];

}
