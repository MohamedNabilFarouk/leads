<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'module_name',
    ];

    public function sub_module(){
        return $this->hasMany(SubModule::class,'module_id');

    }
}
