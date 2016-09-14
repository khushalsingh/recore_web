<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Page_model extends Model
{
	function add_contact_feeds($contact_feed_array){
		return DB::table('contact_us_feeds')->insert($contact_feed_array);
	}
}
