<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registrations', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->string('id',36)->primary();
			$table->boolean('status')->nullable();
			$table->timestamps();
			$table->string('user_id', 36);
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('post_id', 36)->references('id')->on('posts');
			$table->foreign('post_id')->references('id')->on('posts');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('registrations');
	}

}
