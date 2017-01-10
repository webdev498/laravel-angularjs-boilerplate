<?php

class PasswordsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('passwords')->truncate();

		$passwords[] = array(
						'name'=>'Apple',
						'client_id'=>'1',
						'password'=>'peren',
						'url'=>'http://www.apple.com',
						'note'=> 'Nulla vitae elit libero, a pharetra augue. Cras justo odio, dapibus ac facilisis in, egestas eget quam.',
						'created_at'=>date('Y-m-d H:i:s'),
						'updated_at'=>date('Y-m-d H:i:s'),
					);
		DB::table('passwords')->insert($passwords);

	}

}
