<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('address', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id', 10);
			$table->string('zip', 60);
			$table->string('city', 100);
			$table->string('street', 100);
			$table->string('house', 60);
			$table->string('h_pref', 10);
			$table->integer('flat', 10);
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
		Schema::drop('address');
	}

}
