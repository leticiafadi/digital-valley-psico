<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToInfoAlunoSemestreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('info_aluno_semestre', function(Blueprint $table)
		{
			$table->foreign('id_semestre', 'info_aluno_semestre_FK')->references('id')->on('semestre')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('id_aluno', 'info_aluno_semestre_FK_1')->references('id')->on('aluno')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('info_aluno_semestre', function(Blueprint $table)
		{
			$table->dropForeign('info_aluno_semestre_FK');
			$table->dropForeign('info_aluno_semestre_FK_1');
		});
	}

}
