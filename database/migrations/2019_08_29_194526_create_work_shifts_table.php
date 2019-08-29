<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkShiftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_shifts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('working_hour_id')->unsigned();
            $table->foreign('working_hour_id')->references('id')->on('working_hours'); //empleado solicitante
            $table->time('entry');
            $table->time('output');
            $table->time('tolerance');
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
        Schema::dropIfExists('work_shifts');
    }
}
