<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreAtrribEmployee extends Migration
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
               $table->boolean('has_military_card')->default(false);
               $table->boolean('serial_number')->default(false);//numero de serie militar
               
               $table->string('personal_email')->nullable();
               $table->string('corporate_cell')->nullable();
               $table->string('corporate_email')->nullable();
               $table->string('bank')->nullable();
               $table->string('account_number')->nullable();
               /// datos medicos
               $table->string('registration_number_medical')->nullable();
               $table->string('blood_type')->nullable();
               $table->string('doctor_name')->nullable();


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
