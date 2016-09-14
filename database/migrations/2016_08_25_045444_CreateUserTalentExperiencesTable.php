<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTalentExperiencesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('user_talent_experiences', function(Blueprint $table) {
			$table->increments('user_talent_experience_id');
			$table->integer('user_talents_id')->comment = 'user_talent_id FROM user_talents';
			$table->string('user_talent_experience_company');
			$table->string('user_talent_experience_role');
			$table->string('user_talent_experience_years', 20);
			$table->tinyInteger('user_talent_experience_status')->comment = '-1=deleted;0=inactive,1=active';
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('user_talent_experiences');
	}

}
