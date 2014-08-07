<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('registers',function($table){
			$table->increments('id');
			$table->integer('latitude');
			$table->integer('longitude');
			$table->date('date');
			$table->time('time');
			$table->string('type');
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
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
		Schema::table('registers', function($table) {
			$table->dropForeign('registers_user_id_foreign'); 
		});

		Schema::drop('registers');

	}

}
