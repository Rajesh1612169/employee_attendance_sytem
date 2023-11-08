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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->integer('company_id');
            $table->integer('group_id');
            $table->integer('sub_group_id');
            $table->string('name');
            $table->string('email');
            $table->integer('phone');
            $table->string('address');
            $table->integer('designation');
            $table->integer('salary');
            $table->timestamps();

            $table->foreign('company_id')->references('id')->on('company')
            ->onDelete('cascade');
            $table->foreign('group_id')->references('id')->on('company_groups')
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
        Schema::dropIfExists('employees');
    }
};
