<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectImage extends Model
{
    use HasFactory;
    protected $fillable=['project_id','file','name','user_id'];

    public function user(){
        return $this->belongsTo('\App\Models\User','user_id');
    }

}
