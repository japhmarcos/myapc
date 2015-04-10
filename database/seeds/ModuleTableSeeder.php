<?php

use Illuminate\Database\Seeder;
use App\Module as Module;
	
	class ModuleTableSeeder extends Seeder
	{
		
		public function run()
		{
			Module::truncate();
			Module::create ([
				'id' => '1',
				'name' => 'News'
			]);

			Module::create ([
				'id' => '2',
				'name' => 'Announcements'
			]);	

			Module::create ([
				'id' => '3',
				'name' => 'Organizations'
			]);			
		}
	}

?>