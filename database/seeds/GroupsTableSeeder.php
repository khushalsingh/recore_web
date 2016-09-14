<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$keys = array('group_id', 'group_name', 'group_slug', 'group_status', 'group_created', 'group_modified');
		$values = array(array(1, 'Administrator', 'administrator', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
			array(2, 'Employer', 'employer', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
			array(3, 'User', 'user', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00')
		);
		$group_array = array();
		foreach ($values as $value) {
			$group_array[] = array_combine($keys, $value);
		}
		DB::table('groups')->insert($group_array);
	}

}
