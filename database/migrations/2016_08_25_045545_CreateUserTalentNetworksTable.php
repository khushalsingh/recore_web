<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTalentNetworksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('user_talent_networks', function(Blueprint $table) {
			$table->increments('user_talent_network_id');
			$table->integer('user_talents_id')->comment = 'user_talent_id FROM user_talents';
			$table->integer('users_id')->comment = 'id FROM users';
			$table->text('user_talent_network_comment');
			$table->tinyInteger('user_talent_network_status')->comment = '-1=deleted;0=inactive,1=active';
			$table->dateTime('user_talent_network_created');
			$table->dateTime('user_talent_network_modified');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		$table->drop('user_talent_networks');
	}

}
