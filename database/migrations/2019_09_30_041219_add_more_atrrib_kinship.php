<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreAtrribKinship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('families', function (Blueprint $table) {
         
            $table->boolean('is_reference')->default(false); //apellido casada
            $table->string('phone')->nullable(); 
            $table->string('cellphone')->nullable();    
            
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
