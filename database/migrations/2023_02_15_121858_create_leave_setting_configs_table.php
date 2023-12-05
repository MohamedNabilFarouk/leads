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
        Schema::create('leave_setting_configs', function (Blueprint $table) {
            $table->id();
            $table->string('leave_name')->nullable();
            $table->string('common_value')->default(1);
            $table->integer('carry_forward')->default(0);
            $table->integer('earned_leave')->default(0);
            $table->integer('custom_policy')->default(0);
            $table->integer('gender')->default(0);
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
        Schema::dropIfExists('leave_setting_configs');
    }
};
