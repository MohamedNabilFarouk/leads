<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company_client extends Model
{
    use HasFactory;

    protected  $fillable = ['first_name','last_name','name','email','password','phone_number','client_id','company_name','job_title'];

public function project(){
    return $this->hasMany('\App\Models\Project','client_id');
}
}
