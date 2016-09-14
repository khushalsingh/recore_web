<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$keys = array('skill_id', 'skill_name', 'skill_slug', 'skill_status', 'skill_created', 'skill_modified');
		$values = array(
			array(1, 'Web', 'web', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
			array(2, 'Network', 'network', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
			array(3, 'technology', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00')
		);
		$skill_array = array();
		foreach ($values as $value) {
			$skill_array[] = array_combine($keys, $value);
		}
		DB::table('skills')->insert($skill_array);
	}

}
