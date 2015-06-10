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
		Schema::create('posts',function($table)
		{
			$table->increments('id');
			$table->integer('usr_id');
			$table->string('title');
			$table->longText('description');
			$table->string('headline');
			$table->string('caption');
			$table->string('url');
			$table->string('post_img');
			$table->string('post_vedio');
			$table->string('credits');
			$table->string('thumbnail');
			$table->integer('category');
			$table->integer('count');
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
		Schema::drop('posts');
	}

}
