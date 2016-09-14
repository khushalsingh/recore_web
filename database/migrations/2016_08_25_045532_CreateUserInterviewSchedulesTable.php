<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserInterviewSchedulesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {

		Schema::create('user_interview_schedules', function(Blueprint $table) {
			$table->increments('user_interview_schedule_id');
			$table->integer('user_talents_id')->comment = "user_talent_id FROM user_talents";
			$table->integer('users_id')->comment = "id FROM users";
			$table->date('user_interview_schedule_date');
			$table->time('user_interview_schedule_time');
			$table->tinyInteger('user_interview_schedule_status')->comment = "-1=deleted;0=inactive;1=active";
			$table->dateTime('user_interview_schedule_created');
			$table->dateTime('user_interview_schedule_modified');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('user_interview_schedules');
	}

}
