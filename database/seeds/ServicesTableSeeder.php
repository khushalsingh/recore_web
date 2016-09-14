<?php

use Illuminate\Database\Seeder;

class ServicesTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		$keys = array('service_id', 'service_name', 'service_slug', 'service_status', 'service_created', 'service_modified');
		$values = array(
		array(1, 'Web', 'web', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
		array(2, 'Network', 'network', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
		array(3, 'technology', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00')
		);
		$service_array = array();
		foreach ($values as $value) {
			$service_array[] = array_combine($keys, $value);
		}
		DB::table('services')->insert($service_array);
	}

}
