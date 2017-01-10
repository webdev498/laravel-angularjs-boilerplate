<?php

class ClientsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		 DB::table('clients')->truncate();

		$clients[] = array(
						'title'=>'Strangelove',
						'slug'=>'strangelove',
						'description'=>'Praesent commodo cursus magna, vel scelerisque nisl consectetur et.',
						'body'=>'Nulla vitae elit libero, a pharetra augue. Cras justo odio, dapibus ac facilisis in, egestas eget quam.',
						'created_at'=>date('Y-m-d H:i:s'),
						'updated_at'=>date('Y-m-d H:i:s'),
					);
		$clients[] = array(
						'title'=>'Apple',
						'slug'=>'apple',
						'description'=>'Praesent commodo cursus magna, vel scelerisque nisl consectetur et.',
						'body'=>'Nulla vitae elit libero, a pharetra augue. Cras justo odio, dapibus ac facilisis in, egestas eget quam.',
						'created_at'=>date('Y-m-d H:i:s'),
						'updated_at'=>date('Y-m-d H:i:s'),
					);

		// Uncomment the below to run the seeder
		 DB::table('clients')->insert($clients);
	}

}
