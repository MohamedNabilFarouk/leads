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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('net_salary')->nullable();
            $table->string('basic_salary')->nullable();
            $table->float('house_allowance')->nullable();
            $table->float('transportation')->nullable();
            $table->float('gosi')->nullable();
            $table->float('food')->nullable();
            $table->integer('working_days')->nullable();
            $table->integer('extra_days')->nullable();
            $table->float('evening_shift')->nullable();
            $table->string('overtime')->nullable();
            $table->double('overtime_price')->nullable();
            $table->float('other_earning')->nullable();
            $table->text('addition_payroll_item')->nullable();
            $table->float('deduction')->nullable();
            $table->double('month_absence')->nullable();
            $table->double('loan')->nullable();
            $table->double('other_deduction')->nullable();
            $table->text('deduction_payroll_item')->nullable();
            $table->string('salary_month')->nullable();
            $table->string('insurance_addition')->nullable();
            $table->string('insurance_deduction')->nullable();
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
        Schema::dropIfExists('payrolls');
    }
};
