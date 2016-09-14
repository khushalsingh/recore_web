<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTalentQualificationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('user_talent_qualifications', function(Blueprint $table) {
			$table->increments('user_talent_qualification_id');
			$table->integer('user_talents_id')->comment = 'user_talent_id FROM user_talents';
			$table->string('qualifications_id')->comment = 'qualification_id FROM qualifications';
			$table->string('courses_id')->comment = 'course_id FROM courses';
			$table->string('user_talent_qualification_school', 20);
			$table->string('user_talent_qualification_percentage', 5);
			$table->tinyInteger('user_talent_qualification_status')->comment = '-1=deleted;0=inactive,1=active';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('user_talent_qualifications');
	}

}
