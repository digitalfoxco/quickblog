<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class AboutTableSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		//refresh about
		DB::table('about')->truncate();
		$About=array(
					array(	
					'title'				=> 'About Me',
					'sub_title'			=> 'This is what I do.',
					'image'				=> 'about-bg.jpg',
					'status'			=> 'active',
					'content'		=> 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Saepe nostrum ullam eveniet pariatur voluptates odit, fuga atque ea nobis sit soluta odio, adipisci quas excepturi maxime quae totam ducimus consectetur?

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eius praesentium recusandae illo eaque architecto error, repellendus iusto reprehenderit, doloribus, minus sunt. Numquam at quae voluptatum in officia voluptas voluptatibus, minus!

Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nostrum molestiae debitis nobis, quod sapiente qui voluptatum, placeat magni repudiandae accusantium fugit quas labore non rerum possimus, corrupti enim modi! Et.
',
					'created_at'		=>	new DateTime,
					'updated_at'		=>	new DateTime,
					)
				);									
		  DB::table('about')->insert($About);
	}

}
