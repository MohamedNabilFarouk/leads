<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailLeaveSetting extends Model
{
    use HasFactory;
    protected $fillable=['type','times','more_than','less_than','percentage_type','percentage','message_en','message_ar'];
}
