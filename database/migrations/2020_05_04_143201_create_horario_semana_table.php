<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHorarioSemanaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('horario_semana', function(Blueprint $table)
		{
			$table->date('dia');
			$table->enum('horario', array('a','b','c','d','e','f','g','h','i','j'));
			$table->integer('id', true);
			$table->integer('id_semana')->index('horario_semana_FK');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('horario_semana');
	}

}
