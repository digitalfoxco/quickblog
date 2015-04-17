<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();
		
		$seeders = array('UserTableSeeder', 'AboutTableSeeder', 'ContactsTableSeeder', 'PostTableSeeder', 'HomeTableSeeder');
			
		foreach($seeders as $seed) {
			$this->command->info("Seeding: {$seed}");
			$this->call($seed);
		}
	}

}
