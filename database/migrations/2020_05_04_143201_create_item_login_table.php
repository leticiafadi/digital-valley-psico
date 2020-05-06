<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateItemLoginTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('item_login', function(Blueprint $table)
		{
			$table->timestamps();
			$table->increments('id');
			$table->integer('id_login')->unsigned()->index('item_login_id_login_foreign');
			$table->string('usuario', 63);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('item_login');
	}

}
