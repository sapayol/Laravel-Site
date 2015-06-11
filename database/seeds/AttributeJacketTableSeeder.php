<?php

use Illuminate\Database\Seeder;

class AttributeJacketTableSeeder extends Seeder {

	public function run()
	{
    DB::statement('SET FOREIGN_KEY_CHECKS = 0'); // disable foreign key constraints
		DB::table('attribute_jacket')->truncate();
    DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints


    $attributes = Attribute::all();
    $jackets = Jacket::all();

    foreach ($jackets as $jacket) {
      foreach ($attributes as $attribute) {
        // $n = rand(1, 2);
        // if ($n == 1) {
          DB::insert('insert into attribute_jacket (attribute_id, jacket_id) values (?, ?)', array($attribute->id, $jacket->id));
        // }
      }
    }

		// DB::statement('SET FOREIGN_KEY_CHECKS = 1'); // enable foreign key constraints
	}

}
