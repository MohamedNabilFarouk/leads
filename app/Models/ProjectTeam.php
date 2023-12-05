<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectTeam extends Model
{
    use HasFactory;
    protected $fillable=['project_id','team_id','team_type'];
    public function user(){
        return $this->belongsTo('\App\Models\User','team_id');
    }

}
