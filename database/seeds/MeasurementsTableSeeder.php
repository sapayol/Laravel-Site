<?php

use Illuminate\Database\Seeder;

class MeasurementsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('measurements')->truncate();

		$faker = Faker\Factory::create();

		Measurement::create([
			'units'         => 'cm',
			'type'          => 'standard',
			'size'          => 44,
			'half_shoulder' => 17.2,
			'back_width'    => 20,
			'back_length'   => 18.1,
			'chest'         => 16.6,
			'stomach'       => 21.4,
			'waist'         => 24.2,
			'arm'           => 18.1,
			'biceps'        => 6.9,
			'note'          => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus asperiores earum eaque quo iste velit.'
		]);

		Measurement::create([
			'units'         => 'cm',
			'type'          => 'standard',
			'size'          => 46,
			'half_shoulder' => 17.2,
			'back_width'    => 20,
			'back_length'   => 18.1,
			'chest'         => 16.6,
			'stomach'       => 21.4,
			'waist'         => 24.2,
			'arm'           => 18.1,
			'biceps'        => 6.9,
			'note'          => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus asperiores earum eaque quo iste velit.'
		]);

		Measurement::create([
			'units'         => 'cm',
			'type'          => 'standard',
			'size'          => 48,
			'half_shoulder' => 17.2,
			'back_width'    => 20,
			'back_length'   => 18.1,
			'chest'         => 16.6,
			'stomach'       => 21.4,
			'waist'         => 24.2,
			'arm'           => 18.1,
			'biceps'        => 6.9,
			'note'          => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus asperiores earum eaque quo iste velit.'
		]);

		Measurement::create([
			'units'         => 'cm',
			'type'          => 'standard',
			'size'          => 50,
			'half_shoulder' => 17.2,
			'back_width'    => 20,
			'back_length'   => 18.1,
			'chest'         => 16.6,
			'stomach'       => 21.4,
			'waist'         => 24.2,
			'arm'           => 18.1,
			'biceps'        => 6.9,
			'note'          => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus asperiores earum eaque quo iste velit.'
		]);

		Measurement::create([
			'units'         => 'cm',
			'type'          => 'standard',
			'size'          => 52,
			'half_shoulder' => 17.2,
			'back_width'    => 20,
			'back_length'   => 18.1,
			'chest'         => 16.6,
			'stomach'       => 21.4,
			'waist'         => 24.2,
			'arm'           => 18.1,
			'biceps'        => 6.9,
			'note'          => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus asperiores earum eaque quo iste velit.'
		]);

		Measurement::create([
			'units'         => 'cm',
			'type'          => 'standard',
			'size'          => 54,
			'half_shoulder' => 17.2,
			'back_width'    => 20,
			'back_length'   => 18.1,
			'chest'         => 16.6,
			'stomach'       => 21.4,
			'waist'         => 24.2,
			'arm'           => 18.1,
			'biceps'        => 6.9,
			'note'          => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Natus asperiores earum eaque quo iste velit.'
		]);



	}

}
