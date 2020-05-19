<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAtendimentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('atendimento', function(Blueprint $table)
		{
			$table->foreign('id_aluno', 'atendimento_FK')->references('id')->on('aluno')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_horario', 'atendimento_FK_1')->references('id')->on('horario_semana')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_psicologo', 'atendimento_FK_2')->references('id')->on('funcionario')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('atendimento', function(Blueprint $table)
		{
			$table->dropForeign('atendimento_FK');
			$table->dropForeign('atendimento_FK_1');
		});
	}

}
