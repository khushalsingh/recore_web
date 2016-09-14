<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTalentTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('user_talents', function(Blueprint $table) {
			$table->increments('user_talent_id');
			$table->string('user_talent_first_name');
			$table->string('user_talent_last_name');
			$table->string('user_talent_email');
			$table->string('user_talent_current_position');
			$table->integer('talent_categories_id')->comment = 'talent_category_id FROM talent_categories';
			;
			$table->string('user_talent_contact', 20);
			$table->string('user_talent_alternative_contact', 20);
			$table->string('user_talent_level_of_experience');
			$table->tinyInteger('user_talent_gender')->comment = '1=male;2=female';;
			$table->date('user_talent_dob');
			$table->mediumText('user_talent_video_link');
			$table->mediumText('user_talent_work_style_assessment');
			$table->string('user_talent_resume', 45);
			$table->text('user_talent_resume_original_file');
			$table->string('user_talent_image', 45);
			$table->string('user_talent_thumb', 50);
			$table->tinyInteger('user_talent_status')->comment = '-1=deleted;0=inactive,1=active';
			$table->dateTime('user_talent_created');
			$table->dateTime('user_talent_modified');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('user_talents');
	}

}
