<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHasPermission extends Model
{
    use HasFactory;
    protected $fillable = [
      'permission_id','model_type','model_id'
    ];

    public function user(){
        return $this->hasMany('\App\Models\User','id','model_id');

    }

    public function permission(){
        return $this->belongsTo('\App\Models\Permission','permission_id');

    }

}
