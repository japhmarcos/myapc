<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
			$table->string('id', 36)->primary();
			$table->string('last_name')->nullable();
			$table->string('first_name')->nullable();
			$table->string('mi')->nullable();
			$table->string('course')->nullable();
			$table->string('contact')->nullable();
			$table->string('image')->nullable();
			$table->string('email')->unique();
			$table->string('password', 60);
			$table->boolean('status')->nullable();
			$table->rememberToken();
			$table->timestamps();
			$table->integer('user_type_id')->unsigned()->nullable();
			$table->foreign('user_type_id')->references('id')->on('user_types');
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
