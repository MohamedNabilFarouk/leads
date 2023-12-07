<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;

class Project extends Model
{
    use HasFactory,UsesTenantConnection;
    protected $fillable=['title','photo','region','map','description','video','status','created_by'];

    public function teamLeaderName(){
        return $this->belongsTo('\App\Models\User','team_leader');
    }


    public function ProjectImage(){
        return $this->hasMany('\App\Models\ProjectImage','project_id');
    }


    public function team(){
        return $this->belongsToMany('\App\Models\User','project_teams','project_id','team_id');

    }
    public function region(){
        return $this->belongsTo('\App\Models\Region','region');
    }

}
