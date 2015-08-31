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
			'name'   => "Bopgun",
			'gender' => 'male',
			'model'  => 'bopgun',
			'price'  => 1279.00,
			'active' => 0,
		]);

		Jacket::create([
			'name'   => "Moto",
			'gender' => 'male',
			'model'  => 'moto',
			'price'  => 1279.00,
			'active' => 0,
		]);

		Jacket::create([
			'name'   => "MA1",
			'gender' => 'male',
			'model'  => 'ma1',
			'price'  => 1279.00,
			'active' => 0,
		]);

	}
}
