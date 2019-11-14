<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRefreshmentsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('refreshments', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->bigInteger('employee_id')->unsigned();
			$table->foreign('employee_id')->references('id')->on('employees'); //empleado
			$table->integer('days_work_month')->nullable(); //dias trabajo mes
			$table->integer('sunday_holiday')->nullable(); //feriados domingos
			$table->integer('low_license')->nullable(); //licencias bajas medicas
			$table->integer('faults')->nullable(); //faltas
			$table->integer('holidays')->nullable(); //vacaciones
			$table->integer('commissions')->nullable(); //comisiones
			$table->integer('days_subject_to_payment')->nullable(); //dias sujeto a pago
			$table->decimal('ross_amount')->nullable(); //monto bruto
			$table->decimal('invoices_110')->nullable(); //monto bruto
			$table->decimal('hold_time')->nullable(); //reten tiempo
			$table->decimal('total_net_snack')->nullable(); //total refrigerio neto
			$table->decimal('product_for_consumption')->nullable(); //total refrigerio a depositar
			$table->decimal('commission_for_deposit')->nullable(); //comision por deposito
			$table->decimal('total_snack_to_deposit')->nullable(); //total refrigerio a depositar
			$table->date('date')->nullable();
			$table->time('hour_in')->nullable();
			$table->char('state', 1);
			$table->integer('user_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('refreshments');
	}
}
