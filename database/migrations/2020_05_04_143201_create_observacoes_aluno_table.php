<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObservacoesAlunoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('observacoes_aluno', function(Blueprint $table)
		{
			$table->string('comentario', 256);
			$table->integer('id', true);
			$table->integer('id_aluno')->unsigned()->index('observacoes_aluno_FK');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('observacoes_aluno');
	}

}
