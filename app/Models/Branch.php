<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    protected $table = 'branches';
    protected $guarded = [
    ];
    protected $fillable=['radius','lat','lng','title','title_ar','nfc_id'];
    protected $hidden = [];
}
