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
        Schema::create('work_sheet', function (Blueprint $table) {
            $table->id();
            $table->integer('employee_id')->nullable();
            $table->text('attendance_type')->nullable();
            $table->text('shift_from')->nullable();
            $table->text('shift_to')->nullable();
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
        Schema::dropIfExists('work_sheet');
    }
};
