<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQualificationTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('qualifications', function(Blueprint $table) {
			$table->increments('qualification_id');
			$table->string('qualification_name');
			$table->string('qualification_slug');
			$table->tinyInteger('qualification_status')->comment = '-1=deleted;0=inactive,1=active';
			$table->dateTime('qualification_created');
			$table->dateTime('qualification_modified');
		});
		Schema::create('courses', function(Blueprint $table) {
			$table->increments('course_id');
			$table->string('course_name');
			$table->string('course_slug');
			$table->integer('qualifications_id');
			$table->tinyInteger('course_status')->comment = '-1=deleted;0=inactive,1=active';
			$table->dateTime('course_created');
			$table->dateTime('course_modified');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('qualifications');
		Schema::drop('courses');
	}

}
