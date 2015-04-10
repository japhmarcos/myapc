<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->string('id', 36)->primary();
			$table->string('title')->nullable();
			$table->mediumText('body')->nullable();
			$table->integer('rating')->nullable();
			$table->timestamps();
			$table->string('post_id', 36)->nullable();
			$table->foreign('post_id')->references('id')->on('posts');
			$table->string('event_id', 36)->nullable();
			$table->foreign('event_id')->references('id')->on('events');
			$table->string('user_id', 36);
			$table->foreign('user_id')->references('id')->on('users');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
