<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;
use Spatie\Multitenancy\Models\Concerns\UsesTenantConnection;


class Attendance extends Eloquent
{
    protected $connection = 'mongodb';
    protected $collection  = 'attendances';
    //protected $primaryKey = 'id';

//    use HasFactory;
    protected $fillable = [
        'date',
        'check_in',
        'check_out',
        'user_id',
        'domain'
    ];
//protected $guarded=[];
}
