<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    use HasFactory;

    protected $fillable = ['title_en','title_ar','description_en','description_ar','image','button_name_en','button_name_ar','link','active'];

}
