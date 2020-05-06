<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateConsultasTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('consultas', function(Blueprint $table)
		{
			$table->boolean('auxilio');
			$table->boolean('bolsista');
			$table->timestamps();
			$table->string('curso_atual', 31);
			$table->string('cursos_concluidos', 127)->nullable();
			$table->string('cursos_em_andamento', 127)->nullable();
			$table->date('data_nascimento');
			$table->string('email', 127);
			$table->enum('encaminhado_por', array('professor','diretoria','espontaneo','outro'));
			$table->string('endereco', 127);
			$table->string('estado_civil', 15);
			$table->enum('filhos', array('sim','nao'));
			$table->enum('forma_ingresso', array('ampla','cotas'));
			$table->enum('formacao_escolar', array('publica','privada','ambos'));
			$table->increments('id');
			$table->integer('matricula');
			$table->string('motivo', 511)->nullable();
			$table->string('naturalidade', 64);
			$table->string('nome');
			$table->string('observacoes_horarios', 191)->nullable();
			$table->string('outra_forma_de_condicao', 31)->nullable();
			$table->string('outro_encaminhamento', 31)->nullable();
			$table->string('periodo_auxilio', 31)->nullable();
			$table->string('periodo_bolsa', 31)->nullable();
			$table->string('periodo_outra_forma', 31)->nullable();
			$table->enum('reside_com', array('sozinho','familiares','amigos','parentes','outros'));
			$table->string('reside_com_outros', 31)->nullable();
			$table->string('semestre', 31);
			$table->string('semestre_ingresso', 15);
			$table->string('telefone_celular', 15);
			$table->string('telefone_outros', 15)->nullable();
			$table->string('telefone_residencial', 15)->nullable();
			$table->string('tipo_auxilio', 31)->nullable();
			$table->string('tipo_bolsa', 31)->nullable();
			$table->string('tipo_cotas', 31)->nullable();
			$table->string('turno', 15);
			$table->boolean('visualizado');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('consultas');
	}

}
