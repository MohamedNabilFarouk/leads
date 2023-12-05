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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('subject')->nullable();
            $table->string('assign_staff')->nullable();
            $table->string('followers')->nullable();
            $table->unsignedBigInteger('client')->nullable();
            $table->unsignedBigInteger('created_by')->nullable();
            $table->string('priority')->nullable();
            $table->text('des')->nullable();
            $table->text('photo')->nullable();
            $table->text('photo_name')->nullable();
            $table->string('ticket_id')->nullable();
            $table->string('status')->default('Pending');
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
        Schema::dropIfExists('tickets');
    }
};
