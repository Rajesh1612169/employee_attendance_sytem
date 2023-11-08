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
        Schema::create('attendance_faults', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');
            $table->string('time_in');
            $table->string('time_out');
            $table->string('status');
            $table->timestamps();

            $table->foreign('emp_id')->references('id')->on('employees')
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
        Schema::dropIfExists('attendance_faults7');
    }
};
