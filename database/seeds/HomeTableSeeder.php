<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class HomeTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//refresh home
		DB::table('home')->truncate();
		$Home=array(
					array(	
					'title'				=> 'Clean Blog',
					'sub_title'			=> 'A Clean Blog Theme by Start Bootstrap',
					'image'				=> 'home-bg.jpg',
					'status'            => 'active',
					'created_at'		=>	new DateTime,
					'updated_at'		=>	new DateTime,
					)
				);									
		  DB::table('home')->insert($Home);
	}

}
