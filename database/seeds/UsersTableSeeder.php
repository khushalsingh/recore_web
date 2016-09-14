<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$keys = array('id', 'groups_id', 'user_facebook_id', 'user_login', 'user_login_salt', 'password', 'user_password_hash', 'user_security_hash', 'user_first_name', 'user_last_name', 'email', 'user_address', 'user_contact', 'user_company', 'user_resume', 'user_position', 'user_resume_original_file', 'user_profile_image', 'user_profile_thumb', 'user_last_logged_in', 'user_status', 'user_is_verified', 'user_verified_on', 'force_change_password', 'user_created', 'updated_at', 'user_modified');
		$values = array(1, 1, '', 'admin', 'da3bb8510b6f3d905b68b273304e1ebb', Hash::make('123456789'), '', 'ebc484587053b364319895ae68234cd4', 'Erginus', '', 'khushal@erginus.com', '', '', '', '', '', '', '', '', '2016-08-10 16:49:38', 1, 1, '0000-00-00 00:00:00', 0, '2015-12-01 00:00:00', '0000-00-00 00:00:00', '2016-01-04 22:31:49');
		DB::table('users')->insert(array_combine($keys, $values));
	}

}
