<?php

use Illuminate\Database\Seeder;
use App\User as User;
	
	class UserTableSeeder extends Seeder
	{
		
		public function run()
		{
			User::truncate();
			User::create ([
				'id' => Uuid::generate(),
				'last_name' => 'Admin',
				'first_name' => 'Admin',
				'mi' => 'A.',
				'contact' => '09123456789',
				'status' => '1',
				'image' => 'ron.jpg',
				'email' => 'admin@gmail.com',
				'password' => Hash::make('admin123'),
				'user_type_id' => '1'
			]);	

			User::create ([
				'id' => Uuid::generate(),
				'last_name' => 'Junior Philippine Information System',
				'first_name' => 'JPIS',
				'mi' => '',
				'contact' => '09123456789',
				'status' => '1',
				'image' => 'jpis.png',
				'email' => 'jpis@gmail.com',
				'password' => Hash::make('orgpassword'),
				'user_type_id' => '2'
			]);

			User::create ([
				'id' => Uuid::generate(),
				'last_name' => 'Harrington',
				'first_name' => 'Kit',
				'mi' => 'N',
				'contact' => '09123456789',
				'status' => '1',
				'image' => 'kit.jpg',
				'email' => 'kit@gmail.com',
				'password' => Hash::make('password'),
				'user_type_id' => '3'
			]);					
		}
	}

?>