<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->timestamps();
			$table->string('email', 191)->unique();
			$table->dateTime('email_verified_at')->nullable();
			$table->increments('id');
			$table->string('name', 191);
			$table->string('password', 191);
			$table->string('remember_token', 100)->nullable();
			$table->enum('tipo', array('usuario','administrador'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
