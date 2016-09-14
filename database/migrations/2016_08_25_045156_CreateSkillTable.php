<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkillTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('skills', function(Blueprint $table) {
			$table->increments('skill_id');
			$table->string('skill_name');
			$table->string('skill_slug');
			$table->tinyInteger('skill_status')->comment = '-1=deleted;0=inactive,1=active';
			$table->dateTime('skill_created');
			$table->dateTime('skill_modified');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('skills');
	}

}
