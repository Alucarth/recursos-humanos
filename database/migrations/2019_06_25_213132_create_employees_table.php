<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('city_identity_card_id')->unsigned(); //identificación del ci
            $table->bigInteger('document_type_id')->unsigned(); //identificación del ci
            $table->bigInteger('country_id')->unsigned(); //identificación del ci
            $table->bigInteger('contract_type_id')->unsigned(); //tipo de contrato
            $table->bigInteger('contract_modality_id')->unsigned(); //tipo de contrato
            $table->bigInteger('area_id')->unsigned();
            $table->bigInteger('healh_box_id')->unsigned();
            $table->string('first_name'); //primer nombre
            $table->string('second_name'); //segundo nombre
            $table->string('last_name'); //apellido paterno
            $table->string('mother_last_name'); //apellido materno
            $table->string('surname_husband')->nullable(); //apellido casada
            $table->date('birth_date'); //fecha de nacimiento
            $table->integer('identity_card'); //carnet de identidad
            $table->enum('gender', ['M', 'F']); // genero
            $table->boolean('disability')->default(false); // discapacidad
            $table->enum('civil_status', ['C', 'S', 'V', 'D'])->nullable(); //estado civil
            $table->string('tutor')->nullable(); // en caso de tener discapacidad
            $table->date('entry_date');
            $table->date('retirement_date');
            $table->string('reason');
            $table->boolean('retired')->default(false);//jubilado
            //contribution_id
            $table->string('cua_nua');
            $table->string('profession');
            $table->string('address');
            $table->integer('phone');
            $table->string('cellphone');
            $table->boolean('curriculum')->default(false);
            $table->string('path_curriculum')->nullable();
            $table->decimal('salary',13,12);
            $table->bigInteger('biometric_code')->nullable();

            $table->foreign('city_identity_card_id')->references('id')->on('cities'); //identificación del ci
            $table->foreign('document_type_id')->references('id')->on('document_types'); //titpo de documento
            $table->foreign('country_id')->references('id')->on('countries'); //pais
            $table->foreign('contract_type_id')->references('id')->on('contract_types'); //tipo decontrato
            $table->foreign('contract_modality_id')->references('id')->on('contract_modalities'); //tipo decontrato
            $table->foreign('area_id')->references('id')->on('areas'); //tipo decontrato
            $table->foreign('healh_box_id')->references('id')->on('health_boxes');
            // $table->date('birth_date');

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
        Schema::dropIfExists('employees');
    }
}
