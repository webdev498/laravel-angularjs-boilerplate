<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePasswordsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('passwords', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name');
			$table->integer('client_id');
			$table->string('password');
			$table->string('url');
			$table->string('username');
			$table->text('note');
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('passwords');
	}

}
