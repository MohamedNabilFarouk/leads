<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadActivity extends Model
{
    use HasFactory;
    protected $guard=[];
    protected $fillable=['activity','comment','user_id','lead_id','status'];
    protected $table = 'lead_activities';

    public function user(){
        return $this->belongsTo('\App\Models\User','user_id');
    }
    public function lead(){
        return $this->belongsTo('\App\Models\Lead','lead_id');
    }
}
