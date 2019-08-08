<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAttributesEmployee extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('employees', function (Blueprint $table) {
         //   $table->dropColumn(['salary']);
            $table->decimal('salary')->nullable();
            $table->bigInteger('contribution_id')->unsigned()->nullable();
            $table->foreign('contribution_id')->references('id')->on('contributions');
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
