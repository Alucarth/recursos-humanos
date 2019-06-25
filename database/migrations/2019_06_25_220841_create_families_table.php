<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name'); //primer nombre
            $table->string('second_name'); //segundo nombre
            $table->string('last_name'); //apellido paterno
            $table->string('mother_last_name'); //apellido materno
            $table->string('surname_husband')->nullable(); //apellido casada
            $table->boolean('disability')->default(false); // discapacidad
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
        Schema::dropIfExists('families');
    }
}
