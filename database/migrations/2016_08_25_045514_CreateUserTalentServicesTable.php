<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTalentServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('user_talent_services', function(Blueprint $table) {
			$table->increments('user_talent_service_id');
			$table->integer('user_talents_id')->comment = 'user_talent_id FROM user_talents';
			$table->integer('services_id')->comment = 'service_id FROM services';
			$table->tinyInteger('user_talent_service_status')->comment = '-1=deleted;0=inactive,1=active';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('user_talent_services');
	}

}
