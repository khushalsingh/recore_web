<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTalentCategoryTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('talent_categories', function (Blueprint $table) {
			$table->increments('talent_category_id');
			$table->string('talent_category_name');
			$table->string('talent_category_slug');
			$table->tinyInteger('talent_category_status')->comment = '-1=deleted;0=inactive,1=active';;
			$table->dateTime('talent_category_created');
			$table->dateTime('talent_category_modified');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('talent_categories');
	}

}
