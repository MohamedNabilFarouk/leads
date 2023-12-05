<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Role extends Model
{
    use HasFactory,UsesTenantConnection;

    protected $fillable = ['role_name','name','name_ar'];
protected $appends=['name_field'];

    public function getNameFieldAttribute(){


        if(app()->getLocale()=='ar'){
            return $this->{'name_'.app()->getLocale()};
        }else{
            return $this->name;
        }
    }
}
