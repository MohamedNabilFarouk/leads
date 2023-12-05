<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable=['company_name','contact_person','address','country','city','state_province','postal_code','email',
                         'phone_number','mobile_number','fax','website_url','default_country','date_format','timezone',
                         'default_language','currency_code','currency_symbol','website_name','logo','favicon'];
}
