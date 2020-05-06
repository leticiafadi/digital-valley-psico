<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAlunoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('aluno', function(Blueprint $table)
		{
			$table->timestamps();
			$table->increments('id');
			$table->integer('id_curso')->unsigned()->index('aluno_id_curso_foreign');
			$table->integer('id_usuario')->unsigned()->index('aluno_id_usuario_foreign');
			$table->integer('matricula')->unsigned();
			$table->string('semestre_matricula', 6);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('aluno');
	}

}
