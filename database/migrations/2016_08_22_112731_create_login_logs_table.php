<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoginLogsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('login_logs', function(Blueprint $table) {
			$table->increments('login_log_id');
			$table->integer('users_id')->comment = 'id FROM users';;
			$table->tinyInteger('login_log_from');
			$table->string('login_log_mode');
			$table->ipAddress('login_log_ip_address');
			$table->text('login_log_user_agent');
			$table->string('login_log_longitude');
			$table->string('login_log_latitude');
			$table->dateTime('login_log_created');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Scheme::drop('login_logs');
	}

}
