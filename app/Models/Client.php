<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Client extends Authenticatable implements MustVerifyEmail
{
    use HasFactory,Notifiable;


    protected $guard = "clients";

    protected $fillable = ['name','slug','email','password','phone','active','verification_token'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function plan(){
        return $this->belongsToMany(SubscriptionPlan::class,'user_subscribers','client_id','plan_id')->withPivot('end_date');
    }






}
