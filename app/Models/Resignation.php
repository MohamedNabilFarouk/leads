<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resignation extends Model
{
    use HasFactory;

    protected $fillable = [
        'resigning_employee','notice_date','resignation_date','reason','approve_status','approve_by'
    ];
    public function user(){
        return $this->belongsTo(User::class,'resigning_employee');
    }
}
