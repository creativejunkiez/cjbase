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
		Schema::create('users',function($table)
		{
			$table->increments('id');
			$table->string('name');
			$table->string('password');
			$table->string('email');
			$table->date('dob');
			$table->string('gender');
			$table->string('usr_img');
			$table->string('header_img');
			$table->string('bio');
			$table->string('orgnisation');
			$table->string('location');
			$table->string('fb_link');
			$table->string('tw_link');
			$table->string('web_link');
			$table->integer('remember_token');
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
		Schema::drop('users');
	}

}
