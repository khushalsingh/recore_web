<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactUsFeedTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('contact_us_feeds', function(Blueprint $table) {
			$table->increments('contact_us_feed_id');
			$table->string('contact_us_feed_first_name');
			$table->string('contact_us_feed_last_name');
			$table->string('contact_us_feed_email');
			$table->string('contact_us_feed_phone');
			$table->string('contact_us_feed_subject');
			$table->text('contact_us_feed_message');
			$table->ipAddress('contact_us_feed_ip');
			$table->text('contact_us_feed_user_agent');
			$table->tinyInteger('contact_us_feed_status')->comment = '-1=deleted;0=inactive,1=active';;
			$table->dateTime('contact_us_feed_created');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('contact_us_feeds');
	}

}
