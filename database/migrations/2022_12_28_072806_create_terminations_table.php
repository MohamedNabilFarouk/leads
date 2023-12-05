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
        Schema::create('terminations', function (Blueprint $table) {
            $table->id();
            $table->integer('terminated_employee')->nullable();
            $table->integer('termination_type')->nullable();
            $table->date('termination_date')->nullable();
            $table->text('reason')->nullable();
            $table->string('approve_status')->nullable();
            $table->integer('approve_by')->nullable();
            $table->date('notice_date')->nullable();
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
        Schema::dropIfExists('terminations');
    }
};
