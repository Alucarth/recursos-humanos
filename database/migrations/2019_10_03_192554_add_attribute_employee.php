<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttributeEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('employees', function (Blueprint $table)
        {
            $table->string('number_healt_box')->nullable();
            $table->string('military_serial_number')->nullable();
            $table->string('number_dependency')->nullable();
            $table->boolean('sworn_declaration')->default(false); //declaracion jurada
            $table->date('date_sworn_declaration')->nullable(); //declaracion jurada fecha
            $table->date('date_reception')->nullable(); //Fecha de entrega a recursos humanos
            $table->string('number_declaration')->nullable();; //Fecha de declaracion jurada
            $table->enum('blouses', ["S","M","L","XL","XXL","XXXL"])->nullable(); //estado civil
            $table->enum('shirt', ["S","M","L","XL","XXL","XXXL"])->nullable(); //estado civil
            $table->enum('t_shirt', ["S","M","L","XL","XXL","XXXL"])->nullable(); //estado civil
            $table->enum('jacket', ["S","M","L","XL","XXL","XXXL"])->nullable(); //estado civil
            $table->integer('boots_number')->nullable(); //estado civil

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
