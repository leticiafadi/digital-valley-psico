<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToObservacoesAlunoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('observacoes_aluno', function(Blueprint $table)
		{
			$table->foreign('id_aluno', 'observacoes_aluno_FK')->references('id')->on('aluno')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('observacoes_aluno', function(Blueprint $table)
		{
			$table->dropForeign('observacoes_aluno_FK');
		});
	}

}
