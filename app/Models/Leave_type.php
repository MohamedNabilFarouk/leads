<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Leave_type extends Model
{
    use HasFactory;
    protected $appends = array('title');
    protected $fillable = [
        'name',
        'name_ar',
        'days'
    ];

    public function leaves(){
        return $this->belongsTo('\App\Models\Leaves','leave_type_id');
    }
    public function getTitleAttribute(){
        if(app()->getLocale()=='ar'){
        return $this->name_ar;
        }else{
            return $this->name;
        }
    }
}
