<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;
    protected $guard=[];
protected $fillable =['name','email','phone','sales_id','project_id','marketer_id','created_by','channel','note','status','communication_way','cancel_reason'];


    public function sales(){
        return $this->belongsTo('\App\Models\User','sales_id');
    }
    public function createdBy(){
        return $this->belongsTo('\App\Models\User','created_by');
    }

    public function status(){
        return $this->belongsTo('\App\Models\LeadSatatus','status');
    }

    public function leadActivity(){
        return $this->hasMany('\App\Models\LeadActivity','lead_id');
    }
    public function project(){
        return $this->belongsTo('\App\Models\Project','project_id');
    }

    public function getLeadData()
    {
        return $this->select('id', 'sales_id', 'created_by')
            ->with('assign', 'createdBy')
            ->get()
            ->map(function ($lead) {
                $assignStaff = $lead->assign ? $lead->assign->pluck('id')->toArray() : [];
                $createdBy = $lead->createdBy ? $lead->createdBy->id : null;
                return [
                    'lead_id' => $lead->id,
                    'assign_staff' => $assignStaff,
                    'created_by' => $createdBy
                ];
            });
    }



}
