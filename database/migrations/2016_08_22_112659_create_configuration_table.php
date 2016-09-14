<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigurationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('configurations', function(Blueprint $table) {
			$table->increments('configuration_id');
			$table->tinyInteger('configuration_type');
			$table->string('configuration_key');
			$table->string('configuration_name');
			$table->mediumText('configuration_value');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('configurations');
	}

}
