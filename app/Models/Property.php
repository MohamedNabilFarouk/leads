<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable=['region','unit_no','bulding_no','land_space','bua','price','meter_price','owner','owner_mobile',
                         'category','unit_type','bedrooms','bathrooms','floor','department','finishing','view','phase','lift',
                         'payment_method','title_en','title_ar','primary_resale','unit_code','description_en','description_ar',
                         'video','pdf','map','created_by'];

}
