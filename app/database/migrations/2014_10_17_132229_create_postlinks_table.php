<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostlinksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postlinks',function($table)
		{
			$table->increments('id');
			$table->integer('usr_id');
			$table->integer('post_id');
			$table->integer('lol');
			$table->integer('win');
			$table->integer('omg');
			$table->integer('cute');
			$table->integer('trashy');
			$table->integer('fail');
			$table->integer('wtf');
			$table->integer('trend');
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
		Schema::drop('postlinks');
	}

}
