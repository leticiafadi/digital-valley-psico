<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToObservacaoAtendimentoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('observacao_atendimento', function(Blueprint $table)
		{
			$table->foreign('id_atendimento', 'observacao_atendimento_FK')->references('id')->on('atendimento')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('observacao_atendimento', function(Blueprint $table)
		{
			$table->dropForeign('observacao_atendimento_FK');
		});
	}

}
