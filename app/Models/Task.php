<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Project;

class Task extends Model
{
    use HasFactory;
    protected $fillable = ['title','user_id','status','project_id','board_status','priority','due_date','created_by','complete_by'];

    public function user(){

        return $this->belongsTo(User::class,'user_id');
    }

    public function project(){
        return $this->belongsTo(Project::class,'project_id');
    }
    public function board(){
        return $this->belongsTo(TaskList::class,'board_status');
    }


}
