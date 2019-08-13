<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('approves', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('employee_request_id')->unsigned();
            $table->foreign('employee_request_id')->references('id')->on('employee_requests'); //empleado solicitante
            $table->enum('state', ['Aprobado', 'Rechazado']); //stado
            $table->date('date');
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
        Schema::dropIfExists('approves');
    }
}
