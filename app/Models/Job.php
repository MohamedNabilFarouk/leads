<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';
    protected $guarded = [
    ];
    protected $hidden = [];

    public function category(){
        return $this->belongsTo('\App\Models\JobCategory','category_id');
    }

    public function applicants(){
        return $this->hasMany('\App\Models\JobApplicant','job_id');
    }
}
