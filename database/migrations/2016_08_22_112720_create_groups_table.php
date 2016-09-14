<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('groups', function(Blueprint $table) {
			$table->increments('group_id');
			$table->string('group_name');
			$table->string('group_slug');
			$table->tinyInteger('group_status')->comment = '-1=deleted;0=inactive,1=active';;
			$table->dateTime('group_created');
			$table->dateTime('group_modified');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('groups');
	}

}
