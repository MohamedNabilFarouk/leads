<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Relations\HasMany;

class UserSubscriber extends Model
{
    use HasFactory;
    protected $fillable = ['client_id','plan_id','payment_status','starting_date','end_date','is_paid','price','trans_id','order_id'];

    public function client(){
        return $this->belongsTo('\App\Models\Client','client_id');
    }
    public function plan(){
        return $this->belongsTo('\App\Models\SubscriptionPlan','plan_id');
    }
}
