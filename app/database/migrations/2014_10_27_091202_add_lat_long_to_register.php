<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLatLongToRegister extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('registers', function($table){
			$table->decimal ('lat',11,8);
			$table->decimal ('lon', 11, 8);
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
			$table->dropColumn('lat');
			$table->dropColumn('lon'); 
		});
	}

}
