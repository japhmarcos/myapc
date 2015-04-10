<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('events', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';
			$table->string('id', 36)->primary();
			$table->string('title')->nullable();
			$table->mediumText('body')->nullable();
			$table->timestamp('date_start')->nullable();
			$table->timestamp('date_end')->nullable();
			$table->time('time_start')->nullable();
			$table->time('time_end')->nullable();
			$table->string('read_more')->nullable();
			$table->string('image')->nullable();
			$table->integer('rating')->nullable();
			$table->string('location')->nullable();
			$table->boolean('status')->nullable();
			$table->mediumText('notes')->nullable();
			$table->timestamps();
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
		Schema::drop('events');
	}

}
