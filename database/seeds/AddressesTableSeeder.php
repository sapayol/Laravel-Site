<?php

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('addresses')->truncate();

		$faker = Faker\Factory::create();

		foreach (range(1, 50) as $index) {
			Address::create([
				'address1' => $faker->streetAddress,
				'address2' => $faker->secondaryAddress,
				'city'     => $faker->city,
				'province'    => strtolower($faker->stateAbbr),
				'postcode' => $faker->postcode,
				'country'  => strtolower($faker->country),
			]);
		}
	}

}
