<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
protected $table = 'countries';
protected $appends = array('national','val');
public function getnationalAttribute()
    {
        return $this->{'country_'.app()->getLocale().'Nationality'};
    }
public function getvalAttribute()
    {
        return $this->{'country_enNationality'};
    }

}
