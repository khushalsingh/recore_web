<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmailsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('emails', function(Blueprint $table) {
			$table->increments('email_id');
			$table->string('email_hash', 32);
			$table->string('email_from');
			$table->string('email_from_name');
			$table->integer('users_id');
			$table->string('email_to');
			$table->text('email_cc');
			$table->text('email_bcc');
			$table->string('email_subject');
			$table->mediumText('email_body');
			$table->tinyInteger('email_status')->comment = '-1=deleted;0=inactive,1=active';
			$table->dateTime('email_created');
			$table->dateTime('email_modified');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('emails');
	}

}
