<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//refresh users
		DB::table('users')->truncate();
		$Users=array(						
					array(	
					'name'		        => 'admin',
					'email'				=> 'admin@gmail.com',
					'password'			=>  Hash::make('123456'),
					'status'			=> 'active',
					'created_at'		=>	new DateTime,
					'updated_at'		=>	new DateTime,
					),
					array(	
					'name'		        => 'user',
					'email'				=> 'user@gmail.com',
					'password'			=>  Hash::make('123456'),
					'status'			=> 'active',
					'created_at'		=>	new DateTime,
					'updated_at'		=>	new DateTime,
					)
				);									
		  DB::table('users')->insert($Users);
	}

}
