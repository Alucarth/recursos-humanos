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
            $table->bigInteger('document_type_id')->unsigned()->nullable(); //identificación del ci
            $table->bigInteger('country_id')->unsigned()->nullable(); //identificación del ci
            $table->bigInteger('contract_type_id')->unsigned()->nullable(); //tipo de contrato
            $table->bigInteger('contract_modality_id')->unsigned()->nullable(); //tipo de contrato
            $table->bigInteger('management_id')->unsigned()->nullable();
            $table->bigInteger('unit_id')->unsigned()->nullable();
            $table->bigInteger('position_id')->unsigned()->nullable();
            $table->bigInteger('area_id')->unsigned()->nullable();
            $table->bigInteger('healh_box_id')->unsigned()->nullable();
            $table->string('first_name'); //primer nombre
            $table->string('second_name')->nullable(); //segundo nombre
            $table->string('last_name'); //apellido paterno
            $table->string('mother_last_name')->nullable(); //apellido materno
            $table->string('surname_husband')->nullable(); //apellido casada
            $table->date('birth_date')->nullable(); //fecha de nacimiento
            $table->string('identity_card'); //carnet de identidad
            $table->enum('gender', ['M', 'F'])->nullable(); // genero
            $table->boolean('disability')->default(false); // discapacidad
            $table->enum('civil_status', ['C', 'S', 'V', 'D'])->nullable(); //estado civil
            $table->string('tutor')->nullable(); // en caso de tener discapacidad
            $table->date('entry_date')->nullable();
            $table->date('retirement_date')->nullable();
            $table->string('reason')->nullable();
            $table->boolean('retired')->default(false);//jubilado
            $table->string('employee_image_path')->nullable();
            //contribution_id
            $table->string('cua_nua')->nullable();
            $table->string('profession')->nullable();
            $table->string('address')->nullable();
            $table->integer('phone')->nullable();
            $table->string('cellphone')->nullable();
            $table->boolean('curriculum')->default(false);
            $table->string('path_curriculum')->nullable();
            $table->decimal('salary')->nullable();
            $table->bigInteger('biometric_code')->nullable();

            $table->foreign('city_identity_card_id')->references('id')->on('cities'); //identificación del ci
            $table->foreign('document_type_id')->references('id')->on('document_types'); //titpo de documento
            $table->foreign('country_id')->references('id')->on('countries'); //pais
            $table->foreign('contract_type_id')->references('id')->on('contract_types'); //tipo decontrato
            $table->foreign('contract_modality_id')->references('id')->on('contract_modalities'); //tipo decontrato
            $table->foreign('management_id')->references('id')->on('managements'); //tipo decontrato
            $table->foreign('unit_id')->references('id')->on('unities'); //tipo decontrato
            $table->foreign('area_id')->references('id')->on('areas'); //tipo decontrato
            $table->foreign('position_id')->references('id')->on('positions'); //tipo decontrato
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
