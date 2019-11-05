<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTypeHoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('type_hours', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('code');
            $table->boolean('monday')->default(false);//lunes
            $table->boolean('tuesday')->default(false);//martes
            $table->boolean('wednesday')->default(false);//mircoles
            $table->boolean('thursday')->default(false);//jueves
            $table->boolean('friday')->default(false);//viernes
            $table->boolean('saturday')->default(false);//sabado
            $table->boolean('sunday')->default(false);//domingo
            $table->time('entry');
            $table->time('output');
            $table->time('tolerance');
            $table->enum('work_shift', ['Mañana', 'Tarde', 'Noche'])->nullable(); //Turno de Trabajo
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
        Schema::dropIfExists('type_hours');
    }
}
