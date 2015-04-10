<?php

use Illuminate\Database\Seeder;
use App\UserType as UserType;
	
	class UserTypeTableSeeder extends Seeder
	{
		
		public function run()
		{
			UserType::truncate();
			UserType::create ([
				'id' => '1',
				'name' => 'Admin'
			]);

			UserType::create ([
				'id' => '2',
				'name' => 'Organization'
			]);	

			UserType::create ([
				'id' => '3',
				'name' => 'Student'
			]);			
		}
	}

?>