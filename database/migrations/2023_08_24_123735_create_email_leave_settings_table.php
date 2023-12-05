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

        Schema::create('email_leave_settings', function (Blueprint $table) {
            $table->id();
            $table->integer('type');
            $table->integer('times');
            $table->integer('more_than');
            $table->integer('less_than');
            $table->integer('percentage');
            $table->integer('percentage_type');
            $table->text('message_en');
            $table->text('message_ar');
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
        Schema::dropIfExists('email_leave_settings');
    }
};
