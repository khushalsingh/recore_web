<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Groups extends Authenticatable {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	public function user() {
		return $this->hasMany('App\User', 'groups_id');
	}

}
