<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToHorarioSemanaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('horario_semana', function(Blueprint $table)
		{
			$table->foreign('id_semana', 'horario_semana_FK')->references('id')->on('semana')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('horario_semana', function(Blueprint $table)
		{
			$table->dropForeign('horario_semana_FK');
		});
	}

}
