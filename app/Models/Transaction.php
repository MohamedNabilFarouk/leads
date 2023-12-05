<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable=['client_id','payment','amount','transaction_date','payment_approve','status'];
    public function client(){
        $this->belongsTo('client_id','id');
    }
}
