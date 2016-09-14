<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTalentSkillsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('user_talent_skills', function(Blueprint $table) {
			$table->increments('user_talent_skill_id');
			$table->integer('user_talents_id')->comment = 'user_talent_id FROM user_talents';
			$table->integer('skills_id')->comment = 'skill_id FROM skills';
			$table->tinyInteger('user_talent_skill_status')->comment = '-1=deleted;0=inactive,1=active';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('user_talent_skills');
	}

}
