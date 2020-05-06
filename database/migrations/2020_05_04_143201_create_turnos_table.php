<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTurnosTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('turnos', function(Blueprint $table)
		{
			$table->enum('dia', array('seg','ter','qua','qui','sex'));
			$table->enum('horario', array('a','b','c','d'));
			$table->increments('id');
			$table->integer('id_consulta')->unsigned()->index('turnos_id_consulta_foreign');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('turnos');
	}

}
