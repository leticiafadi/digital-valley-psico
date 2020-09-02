<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('usuario', function(Blueprint $table)
		{
			$table->timestamps();
			$table->date('data_nascimento');
			$table->enum('genero', array('m','f'));
			$table->increments('id');
			$table->integer('id_endereco')->unsigned()->index('usuario_id_endereco_foreign')->nullable();
			$table->string('nome_completo', 191);
			$table->string('remember_token', 191)->nullable();
			$table->enum('tipo', array('aluno','funcionario'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('usuario');
	}

}
