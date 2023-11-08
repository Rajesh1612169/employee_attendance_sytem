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
        Schema::create('schedule', function (Blueprint $table) {
            $table->id();
            $table->string('schedule_name');
            $table->unsignedBigInteger('emp_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('shift_id');
            $table->timestamps();

            $table->foreign('emp_id')->references('id')->on('employees')
                ->onDelete('cascade');
            $table->foreign('location_id')->references('id')->on('location')
                ->onDelete('cascade');
            $table->foreign('shift_id')->references('id')->on('shifts')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedule');
    }
};
