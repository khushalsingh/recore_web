<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('services', function(Blueprint $table) {
			$table->increments('service_id');
			$table->string('service_name');
			$table->string('service_slug');
			$table->tinyInteger('service_status')->comment = '-1=deleted;0=inactive,1=active';
			$table->dateTime('service_created');
			$table->dateTime('service_modified');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('services');
	}

}
