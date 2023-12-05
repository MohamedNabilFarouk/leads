<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityUser extends Model
{
    use HasFactory;

    protected $fillable = [
      'activity_id',
      'send_id',
      'receive_id',
      'status'
    ];

    public function activity(){
        return $this->belongsTo(Activites::class,'activity_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'send_id','id');
    }
}
