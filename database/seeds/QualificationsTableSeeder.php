<?php

use Illuminate\Database\Seeder;

class QualificationsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$keys = array('qualification_id', 'qualification_name', 'qualification_slug', 'qualification_status', 'qualification_created', 'qualification_modified');
		$values = array(
			array(1, 'UG', 'ug', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
			array(2, 'PG', 'pg', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00')
		);
		$qualification_array = array();
		foreach ($values as $value) {
			$qualification_array[] = array_combine($keys, $value);
		}
		//courses
		$keys = array('course_id', 'qualifications_id', 'course_name', 'course_slug', 'course_status', 'course_created', 'course_modified');
		$values = array(array(1, 1, 'Bachelor of Arts', 'bachelor-of-arts', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
			array(2, 2, 'Master of Arts', 'master-of-arts', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
			array(3, 1, 'BCA', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
			array(4, 2, 'MCA', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00')
		);
		$course_array = array();
		foreach ($values as $value) {
			$course_array[] = array_combine($keys, $value);
		}
		DB::table('qualifications')->insert($qualification_array);
		DB::table('courses')->insert($course_array);
	}

}
