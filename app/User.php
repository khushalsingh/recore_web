<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	public function permission() {
		return $this->belongsTo('App\User', 'groups', 'groups_id');
	}

	protected $fillable = [
		'id', 'user_facebook_id', 'user_first_name', 'user_last_name', 'email', 'groups_id',
		'user_login', 'user_login_salt', 'password', 'user_password_hash', 'user_security_hash', 'user_contact', 'user_address', 'user_company', 'user_resume', 'user_position', 'user_resume_original_file', 'user_profile_image', 'user_profile_thumb', 'user_last_logged_in', 'user_status', 'user_is_verified', 'user_verified_on', 'force_change_password', 'user_created', 'user_modified', 'updated_at', 'group_id', 'group_name', 'group_slug', 'group_status', 'group_created', 'group_modified'
	];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	protected $hidden = [
		'password', 'remember_token',
	];

}
