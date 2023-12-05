<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskActivity extends Model
{
    use HasFactory;

    protected $fillable=['project_id','description','file','filename','created_by'];

    public function user(){
        return $this->belongsTo(User::class,'created_by');
    }
}
