<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInfoAlunoSemestreTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('info_aluno_semestre', function(Blueprint $table)
		{
			$table->string('cursos_andamento', 100)->nullable();
			$table->string('cursos_concluidos', 100)->nullable();
			$table->string('estado_civil', 100);
			$table->enum('forma_ingresso', array('amplo','cotas'));
			$table->enum('formacao_escolar', array('publica','privada','ambas'));
			$table->integer('id', true);
			$table->integer('id_aluno')->unsigned()->index('info_aluno_semestre_FK_1');
			$table->integer('id_semestre')->index('info_aluno_semestre_FK');
			$table->enum('possui_auxilio', array('0','1'));
			$table->enum('possui_bolsa', array('1','0'));
			$table->enum('possui_filhos', array('0','1'));
			$table->enum('reside_com', array('sozinho','familiares','parentes','amigos','outros'));
			$table->string('reside_outros', 100)->nullable();
			$table->integer('semestre_atual');
			$table->string('tipo_auxilio', 100)->nullable();
			$table->string('tipo_bolsa', 100)->nullable();
			$table->string('tipo_cotas', 100)->nullable();
			$table->enum('turno', array('matutino','vespertino','integral','noturno'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('info_aluno_semestre');
	}

}
