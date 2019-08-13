<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttributesPosition extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('positions', function (Blueprint $table) {

            $table->enum('type_dependency', ['Gerencia Ejecutiva','Gerencia', 'Unidad'])->nullable(); //dependencia
            $table->bigInteger('unit_id')->nullable();
            $table->foreign('unit_id')->references('id')->on('unities');
            $table->bigInteger('managament_id')->nullable();
            $table->foreign('managament_id')->references('id')->on('managements');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
