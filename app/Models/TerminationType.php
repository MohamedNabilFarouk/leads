<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TerminationType extends Model
{
    use HasFactory;
    public function getNameAttribute()
    {
        if(app()->getLocale()== 'ar'){
        return $this->{'termination_name_'.app()->getLocale()};
    }else{
        return $this->{'termination_name'};
    }
    }

}
