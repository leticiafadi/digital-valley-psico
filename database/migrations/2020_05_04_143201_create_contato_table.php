<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContatoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contato', function(Blueprint $table)
		{
			$table->string('contato', 63);
			$table->increments('id');
			$table->integer('id_usuario')->unsigned()->index('contato_id_usuario_foreign');
			$table->enum('tipo', array('telefone','celular','email'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contato');
	}

}
