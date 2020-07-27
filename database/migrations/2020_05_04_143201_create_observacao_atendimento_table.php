<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateObservacaoAtendimentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('observacao_atendimento', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('id_atendimento')->unsigned()->index('observacao_atendimento_FK');
			$table->string('observacao');
            $table->dateTime('created_at');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('observacao_atendimento');
	}

}
