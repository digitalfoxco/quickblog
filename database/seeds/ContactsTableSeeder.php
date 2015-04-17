<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ContactsTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//refresh contact
		DB::table('contacts')->truncate();
		$Contacts=array(
					array(	
					'title'				=> 'Contact Me',
					'sub_title'			=> 'Have questions? I have answers (maybe).',
					'image'				=> 'contact-bg.jpg',
					'status'			=> 'active',
					'content'		=> 'Want to get in touch with me? Fill out the form below to send me a message and I will try to get back to you within 24 hours!',
					'created_at'		=>	new DateTime,
					'updated_at'		=>	new DateTime,
					)
				);									
		  DB::table('contacts')->insert($Contacts);
	}

}
