<?php

use Illuminate\Database\Seeder;

class AttributeOrderTableSeeder extends Seeder {

	public function run()
	{
    DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
		DB::table('attribute_order')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints


    $attributes = Attribute::all();
    $orders = Order::all();

    foreach ($orders as $order) {
      foreach ($attributes as $attribute) {
        $n = rand(1, 2);
        if ($n == 1) {
          DB::insert('insert into attribute_order (attribute_id, order_id) values (?, ?)', array($attribute->id, $order->id));
        }
      }
    }

		// DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints
	}

}
