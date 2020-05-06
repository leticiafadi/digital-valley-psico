<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTurnoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('turno', function(Blueprint $table)
		{
			$table->enum('dia_semana', array('seg','ter','qua','qui','sex'));
			$table->time('horario_final');
			$table->time('horario_inicio');
			$table->increments('id');
			$table->integer('id_funcionario')->unsigned()->index('turno_id_funcionario_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('turno');
	}

}
