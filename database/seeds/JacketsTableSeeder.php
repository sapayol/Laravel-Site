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
			'name'   => "Double Rider Biker",
			'gender' => 'male',
			'model'  => 'double-rider-biker',
			'price'  => 1279.00,
			'active' => 1,
		]);

		Jacket::create([
			'name'   => "Men's Bomber",
			'gender' => 'male',
			'model'  => 'bomber',
			'price'  => 1279.00,
			'active' => 1,
		]);

		Jacket::create([
			'name'   => "Women's Bomber",
			'gender' => 'female',
			'model'  => 'biker',
			'price'  => 1079.00,
			'active' => 1,
		]);

	}
}
