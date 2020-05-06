<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSemanaTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('semana', function(Blueprint $table)
		{
			$table->integer('ano');
			$table->date('data_inicio');
			$table->integer('id', true);
			$table->integer('id_funcionario')->unsigned()->index('semana_FK');
			$table->integer('numero_semana');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('semana');
	}

}
