<?php

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder {

	public function run()
	{
    DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
		DB::table('orders')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints


		$this->call('JacketsTableSeeder');

		$faker          = Faker\Factory::create();
		$jackets        = Jacket::all();
		$shipping_types = ['fedex', 'ups_ground', 'dhl'];
		$payment_types  = ['paypal', 'stripe'];

		foreach ($jackets as $jacket) {
			foreach (range(1, 50) as $index) {
				Order::create([
					'total'          => $jacket->price,
					'note'           => $faker->realText(140),
					'status'         => 'paid',
					'shipping_type'  => $shipping_types[$faker->numberBetween(0,1)],
					'payment_type'   => $payment_types[$faker->numberBetween(0,1)],
					'payment_id'     => $faker->numberBetween(12344,17425),
					'user_id'        => $index,
					'address_id'     => $index,
					'jacket_id'      => $jacket->id,
					'measurement_id' => $faker->numberBetween(1,5)
				]);
			}
		}
	}
}
