<?php

use Illuminate\Database\Seeder;

class AttributesTableSeeder extends Seeder {

	public function run()
	{
    DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
		DB::table('attributes')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints

		$faker = Faker\Factory::create();


		//===========================================================================//
		//															LEATHER	COLOR																 //
		//===========================================================================//

			$leather_colors = ['black', 'brown', 'gray', 'navy', 'olive'];

			foreach ($leather_colors as $leather_color) {
				Attribute::create([
					'name'  => $leather_color,
					'type'  => 'leather_color',
					'price' => 0.00
				]);
			}


		//===========================================================================//
		//															LEATHER	TYPE																 //
		//===========================================================================//

			$leather_types = ['lamb heavy', 'goat', 'calf'];

			foreach ($leather_types as $leather_type) {
				Attribute::create([
					'name'  => $leather_type,
					'type'  => 'leather_type',
					'price' => 150.00,
				]);
			}


		//===========================================================================//
		//														 HARDWARE COLOR															   //
		//===========================================================================//

			$hardware_colors = ['silver', 'dark gray', 'gold'];

			foreach ($hardware_colors as $hardware_color) {
				Attribute::create([
					'name'  => $hardware_color,
					'type'  => 'hardware_color',
					'price' => 150.00,
				]);
			}


		//===========================================================================//
		//													  	 LINING COLOR															   //
		//===========================================================================//

			$lining_colors = ['black', 'pink'];

			foreach ($lining_colors as $lining_color) {
				Attribute::create([
					'name'  => $lining_color,
					'type'  => 'lining_color',
					'price' => 150.00,
				]);
			}

	}
}
