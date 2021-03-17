<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnderecoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('endereco', function(Blueprint $table)
		{
            $table->increments('id');
		    $table->string('endereco', 191);
            $table->integer('numero')->unsigned();
		    $table->string('bairro', 191)->nullable();
			$table->integer('id_cidade')->unsigned()->index('endereco_id_cidade_foreign');

		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('endereco');
	}

}
