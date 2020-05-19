<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAtendimentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('atendimento', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('id_aluno')->unsigned()->index('atendimento_FK');
			$table->integer('id_horario')->index('atendimento_FK_1');
			$table->integer('id_psicologo')->unsigned()->index('atendimento_FK_2');
			$table->string('motivo', 50);
			$table->string('encaminhamento', 200);
			$table->enum('status', array('ocorrido','nao_ocorrido','cancelado'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('atendimento');
	}

}
