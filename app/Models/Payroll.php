<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;
    protected $fillable = [
      'user_id','net_salary','basic_salary','house_allowance','transportation','gosi','food','working_days','extra_days',
        'evening_shift','tds','esi','loan','tax','prof_tax','others'

    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
