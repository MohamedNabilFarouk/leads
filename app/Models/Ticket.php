<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $guard=[];

    public function companyclient(){
        return $this->belongsTo('\App\Models\Company_client','client');
    }

    public function assign(){
        return $this->belongsTo('\App\Models\User','assign_staff');
    }
    public function createdBy(){
        return $this->belongsTo('\App\Models\User','created_by');
    }
 public function ticketActivity(){
    return $this->hasMany('\App\Models\TicketActivity','ticket_id');
 }


    public function follower(){
        return $this->belongsTo('\App\Models\User','followers');

    }
}
