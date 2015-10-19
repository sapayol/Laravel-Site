<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

	public function run()
	{
    DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
		DB::table('users')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints

		$faker = Faker\Factory::create();

		User::create([
			'name'     => "Ediz Binder",
			'email'    => 'ediz@sapayol.com',
			'role'     => 'admin',
			'password' => bcrypt('changeme1'),
		]);

		User::create([
			'name'     => "Dima Markus",
			'email'    => 'dima@sapayol.com',
			'role'     => 'admin',
			'password' => bcrypt('changeme1'),
		]);

	}
}
