<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll_items extends Model
{
    use HasFactory;

    protected $fillable = ['payroll_item_name','payroll_item_type','payroll_item_category','unit_calculation','unit_amount','user_id','rate_type','rate'];
}
