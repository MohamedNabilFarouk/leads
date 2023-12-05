<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;
    protected $appends=['name'];

    protected $fillable=['name_en','name_ar','currency','price','frequency','trail_days','permission_id'];

    public function permission(){
        return $this->belongsTo('\App\Models\Permission','permission_id');

    }
    public function clients(){
        return $this->belongsToMany(Client::class,'user_subscribers','plan_id','client_id')->withPivot('end_date');
    }
    public function getNameAttribute(){
        if(app()->getLocale()=='en'){
            return $this->name_en;
        }else{
            return $this->name_ar;
        }
    }


}
