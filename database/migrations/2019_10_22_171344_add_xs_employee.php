<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddXsEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
           //
           Schema::table('employees', function (Blueprint $table)
           {

               $table->enum('blouses', ["XS","S","M","L","XL","XXL","XXXL"])->nullable(); //estado civil
               $table->enum('shirt', ["XS","S","M","L","XL","XXL","XXXL"])->nullable(); //estado civil
               $table->enum('t_shirt', ["XS","S","M","L","XL","XXL","XXXL"])->nullable(); //estado civil
               $table->enum('jacket', ["XS","S","M","L","XL","XXL","XXXL"])->nullable(); //estado civil

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
