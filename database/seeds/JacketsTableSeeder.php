<?php

use Illuminate\Database\Seeder;

class JacketsTableSeeder extends Seeder {

	public function run()
	{
    DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
		DB::table('jackets')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints

		$faker = Faker\Factory::create();

		Jacket::create([
			'name'   => "Bleecker",
			'gender' => 'male',
			'model'  => 'bleecker',
			'price'  => 1299.00,
			'active' => 1,
		]);

		Jacket::create([
			'name'   => "Double Rider Biker",
			'gender' => 'male',
			'model'  => 'double_rider_biker',
			'price'  => 1279.00,
			'active' => 1,
		]);

		Jacket::create([
			'name'   => "Bomber",
			'gender' => 'male',
			'model'  => 'bomber',
			'price'  => 1279.00,
			'active' => 0,
		]);

	}
}
