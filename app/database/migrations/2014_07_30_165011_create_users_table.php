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
		Schema::create('users',function($table){
			$table->increments('id');
			$table->string('email')->unique();
			$table->boolean('remember_token');
			$table->string('password');
			$table->string('name');
			$table->string('last_name');
			$table->integer('phone');
			$table->string('university');
			$table->integer('university_id');
			$table->string('major');
			$table->integer('semester');
			$table->boolean('admin');
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
