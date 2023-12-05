<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_performance extends Model
{
    use HasFactory;
    protected $fillable = [
        'performance_action','production_self_score','production_ro_score','process_improvement_self_score',
        'process_improvement_ro_score','team_management_self_score','team_management_ro_score','knowledge_sharing_self_score',
        'knowledge_sharing_ro_score','reporting_communication_self_score','reporting_communication_ro_score',
        'attendance_planned_unplanned_leaves_self_score','attendance_planned_unplanned_leaves_ro_score',
        'attendance_time_consciousness_self_score','attendance_time_consciousness_ro_score',
        'attitude_behavior_team_collaboration_self_score','attitude_behavior_team_collaboration_ro_score',
        'attitude_behavior_professionalism_responsiveness_self_score','attitude_behavior_professionalism_responsiveness_ro_score',
        'policy_procedures_self_score','policy_procedures_ro_score','initiatives_self_score',
        'initiatives_ro_score','continuous_skill_improvement_self_score','continuous_skill_improvement_ro_score'
    ];
    public function user(){
        return $this->belongsTo('\App\Models\User','user_id');
    }
}
