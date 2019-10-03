<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAtributeFamily extends Migration
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
            $table->bigInteger('healh_box_id')->unsigned()->nullable();
            $table->foreign('healh_box_id')->references('id')->on('health_boxes');
            $table->string('number_healt_box')->nullable();
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
