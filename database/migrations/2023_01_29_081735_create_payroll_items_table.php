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
        Schema::create('payroll_items', function (Blueprint $table) {
            $table->id();
            $table->string('payroll_item_name')->nullable();
            $table->string('payroll_item_type')->nullable();
            $table->string('payroll_item_category')->nullable();
            $table->string('unit_calculation')->nullable();
            $table->string('unit_amount')->nullable();
            $table->string('assignee')->nullable();
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
        Schema::dropIfExists('payroll_items');
    }
};
