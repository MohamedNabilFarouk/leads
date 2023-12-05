<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketActivity extends Model
{
    use HasFactory;
    protected $guard=[];
    protected $table = 'ticket_activities';

    public function user(){
        return $this->belongsTo('\App\Models\User','user_id');
    }
}
