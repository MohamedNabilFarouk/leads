<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table='contact_us';
    protected $appends = array('title','address','address2','country','country2');

    public function getTitleAttribute()
    {
        return $this->{'contact_title_'.app()->getLocale()};
    }
    public function getAddressAttribute()
    {
        return $this->{'contact_address_'.app()->getLocale()};
    }
    public function getAddress2Attribute()
    {
        return $this->{'contact_address2_'.app()->getLocale()};
    }
    public function getCountryAttribute()
    {
        return $this->{'country1_'.app()->getLocale()};
    }
    public function getCountry2Attribute()
    {
        return $this->{'country2_'.app()->getLocale()};
    }

}
