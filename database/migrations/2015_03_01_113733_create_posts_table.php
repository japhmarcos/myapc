<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->string('id', 36)->primary();
			$table->string('title')->nullable();
			$table->mediumText('body')->nullable();
			$table->string('author')->nullable();
			$table->string('image1')->nullable();
			$table->string('image2')->nullable();
			$table->string('image3')->nullable();
			$table->string('read_more')->nullable();
			$table->integer('rating')->nullable();
			$table->boolean('status')->nullable();
			$table->mediumText('notes')->nullable();
			$table->timestamps();
			$table->integer('module_id')->unsigned()->nullable();			
			$table->foreign('module_id')->references('id')->on('modules');
			$table->string('user_id', 36);
			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('posts');
	}

}
