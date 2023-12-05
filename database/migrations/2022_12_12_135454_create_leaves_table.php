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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->integer('leave_type_id')->nullable();
            $table->date('period_from')->nullable();
            $table->date('period_to')->nullable();
            $table->date('work_Resume')->nullable();
            $table->string('dedcut_annual_vacation')->nullable();
            $table->string('ticket_charges')->nullable();
            $table->string('visa_needed')->nullable();
            $table->string('leave_sattus')->nullable();
            $table->string('leave_adress')->nullable();
            $table->string('mobile_number')->nullable();
            $table->text('leave_reason')->nullable();
            $table->integer('employee_replacement')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('approve_leave_status')->nullable();
            $table->integer('approve_by')->nullable();
            $table->float('amount')->nullable();
            $table->float('salary_transportation')->nullable();
	        $table->integer('cost_center')->nullable();
            $table->string('financial_status')->nullable();
            $table->integer('replacement_approval')->nullable();
            $table->string('prescription')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leaves');
    }
};
