<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('users', function (Blueprint $table) {
			$table->increments('id');
			$table->string('user_facebook_id', 64);
			$table->string('user_first_name');
			$table->string('user_last_name');
			$table->string('email')->unique;
			$table->tinyInteger('groups_id')->comment = 'group_id FROM groups';
			$table->string('user_login');
			$table->string('user_login_salt');
			$table->string('password');
			$table->string('user_password_hash');
			$table->string('user_security_hash');
			$table->string('user_contact', 20);
			$table->text('user_address');
			$table->string('user_company');
			$table->string('user_resume', 50);
			$table->string('user_position');
			$table->text('user_resume_original_file');
			$table->string('user_profile_image');
			$table->string('user_profile_thumb');
			$table->dateTime('user_last_logged_in');
			$table->tinyInteger('user_status')->comment = '-1=deleted;0=inactive,1=active';
			$table->tinyInteger('user_is_verified')->comment = '0=No;1=Yes';
			$table->dateTime('user_verified_on');
			$table->tinyInteger('force_change_password');
			$table->dateTime('user_created');
			$table->dateTime('user_modified');
			$table->dateTime('updated_at');
			$table->rememberToken();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('users');
	}

}
