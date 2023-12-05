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
        Schema::create('overtimes', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->date('overtime_date')->nullable();
            $table->string('overtime_time')->nullable();
            $table->integer('overtime_type')->nullable();
            $table->text('overtime_description')->nullable();
            $table->string('overtime_status')->nullable();
            $table->integer('overtime_approve_by')->nullable();
            $table->integer('created_by')->nullable();
            $table->text('overtime_reason')->nullable();
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
        Schema::dropIfExists('overtimes');
    }
};
