<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property_unit_type extends Model
{
    use HasFactory;

    protected $fillable=['title_en','title_ar','category_id'];

}
