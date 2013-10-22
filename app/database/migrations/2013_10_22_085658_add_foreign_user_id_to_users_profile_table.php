<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignUserIdToUsersProfileTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users_profile', function(Blueprint $table) {
			// $table->foreign('user_id')->reference('id')->on('users')->onDelete('cascade');
			// ALTER TABLE users_profile
			// ADD CONSTRAINT userprofile_user_id_foreign
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
		Schema::table('users_profile', function(Blueprint $table) {
			$table->dropForeign('user_profile_user_id_foreign');
		});
	}

}
