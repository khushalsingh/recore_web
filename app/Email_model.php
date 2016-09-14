<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Email_model extends Model {

	function get_queued_email($email_id) {
		if ($email_id !== 0) {
			return DB::table('emails')->where(array('email_status' => '0', 'email_id' => $email_id))->first();
		} else {
			return DB::table('emails')->where(array('email_status' => '0'))->take(20)->get();
		}
	}

	function update_email_status($email_id, $email_update_array) {
		return DB::get('emails')->where('email_id', $email_id)->update($email_update_array);
	}

	function get_email_by_id($email_id) {
		return DB::table('emails')->where('email_id', $email_id)->first();
	}

}
