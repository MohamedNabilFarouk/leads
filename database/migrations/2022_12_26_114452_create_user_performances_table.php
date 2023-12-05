<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_performances', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('date_performance')->nullable();
            $table->string('performance_action')->nullable();
            $table->integer('production_self_score')->nullable();
            $table->integer('production_ro_score')->nullable();
            $table->integer('process_improvement_self_score')->nullable();
            $table->integer('process_improvement_ro_score')->nullable();
            $table->integer('team_management_self_score')->nullable();
            $table->integer('team_management_ro_score')->nullable();
            $table->integer('knowledge_sharing_self_score')->nullable();
            $table->integer('knowledge_sharing_ro_score')->nullable();
            $table->integer('reporting_communication_self_score')->nullable();
            $table->integer('reporting_communication_ro_score')->nullable();
            $table->integer('attendance_planned_unplanned_leaves_self_score')->nullable();
            $table->integer('attendance_planned_unplanned_leaves_ro_score')->nullable();
            $table->integer('attendance_time_consciousness_self_score')->nullable();
            $table->integer('attendance_time_consciousness_ro_score')->nullable();
            $table->integer('attitude_behavior_team_collaboration_self_score')->nullable();
            $table->integer('attitude_behavior_team_collaboration_ro_score')->nullable();
            $table->integer('attitude_behavior_professionalism_responsiveness_self_score')->nullable();
            $table->integer('attitude_behavior_professionalism_responsiveness_ro_score')->nullable();
            $table->integer('policy_procedures_self_score')->nullable();
            $table->integer('policy_procedures_ro_score')->nullable();
            $table->integer('initiatives_self_score')->nullable();
            $table->integer('initiatives_ro_score')->nullable();
            $table->integer('continuous_skill_improvement_self_score')->nullable();
            $table->integer('continuous_skill_improvement_ro_score')->nullable();
            $table->integer('employee_action')->nullable();
            $table->string('employee_objection')->nullable();
            $table->string('employee_professional')->nullable();
            $table->string('employee_personal')->nullable();
            $table->text('employee_comment')->nullable();
            $table->string('hr_status')->nullable();
            $table->string('total')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_performances');
    }
};
