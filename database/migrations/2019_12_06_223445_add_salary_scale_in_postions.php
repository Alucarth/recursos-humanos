<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSalaryScaleInPostions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('positions', function (Blueprint $table)
        {
            $table->bigInteger('salary_scale_id')->unsigned()->nullable();
            $table->foreign('salary_scale_id')->references('id')->on('salary_scales');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('postions', function (Blueprint $table) {
            //
        });
    }
}
