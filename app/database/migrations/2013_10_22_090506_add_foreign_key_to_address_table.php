<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeyToAddressTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('address', function(Blueprint $table) {
			// $table->foreign('user_id')->reference('id')->on('users')->onDelete('cascade');
		// ALTER TABLE address
		// ADD CONSTRAINT address_user_id_foreign
		// FOREIGN KEY (user_id) REFERENCES users(id)
		// ON DELETE CASCADE
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('address', function(Blueprint $table) {
			$table->dropForeign('address_user_id_foreign');
		});
	}

}
