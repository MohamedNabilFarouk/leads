<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;


class Absence extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection  = 'absences';

//    use HasFactory;
    protected $fillable = [
        'date',
        'worked_hrs',
        'status', //1 is absent , 2 is late, 3 is overtime, 4 early leave
        'user_id',
        'domain'
    ];
//protected $guarded=[];
}
