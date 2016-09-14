<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Auth_model extends Model {

	function add_user($user_insert_array) {
		return DB::table('users')->insertGetId($user_insert_array);
	}

}
