<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToEnderecoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('endereco', function(Blueprint $table)
		{
			$table->foreign('id_cidade')->references('id')->on('cidade')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('endereco', function(Blueprint $table)
		{
			$table->dropForeign('endereco_id_cidade_foreign');
		});
	}

}
