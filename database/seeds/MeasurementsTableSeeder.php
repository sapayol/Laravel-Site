<?php

use Illuminate\Database\Seeder;

class MeasurementsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('measurements')->truncate();

		$faker = Faker\Factory::create();

		Measurement::create([
			'type'						=> 'standard',
			'price'           => 0.00,
			'size'            => 44,
			'shoulders_front' => 16.3,
			'pits_across'     => 19,
			'mid'             => 17.2,
			'waist'           => 17.6,
			'front_length'    => 20,
			'back_length'     => 22,
			'sleeve_length'   => 23,
			'width_at_pit'    => 6.5,
			'width_at_elbow'  => 5.9,
			'width_at_cuff'   => 5.4,
			'shoulder'        => null,
			'chest'           => null,
			'biceps'          => null,
			'note'            => ''
		]);

		Measurement::create([
			'type'						=> 'standard',
			'price'           => 0.00,
			'size'            => 46,
			'shoulders_front' => 17.3,
			'pits_across'     => 20,
			'mid'             => 18.1,
			'waist'           => 18.6,
			'front_length'    => 21.4,
			'back_length'     => 23.2,
			'sleeve_length'   => 24.2,
			'width_at_pit'    => 6.9,
			'width_at_elbow'  => 6.2,
			'width_at_cuff'   => 5.5,
			'shoulder'        => null,
			'chest'           => null,
			'biceps'          => null,
			'note'            => ''
		]);

		Measurement::create([
			'type'						=> 'standard',
			'price'           => 0.00,
			'size'            => 48,
			'shoulders_front' => 18,
			'pits_across'     => 21,
			'mid'             => 19,
			'waist'           => 19.5,
			'front_length'    => 22.5,
			'back_length'     => 24.5,
			'sleeve_length'   => 25.4,
			'width_at_pit'    => 7.3,
			'width_at_elbow'  => 7.7,
			'width_at_cuff'   => 6.7,
			'shoulder'        => null,
			'chest'           => null,
			'biceps'          => null,
			'note'            => ''
		]);

		Measurement::create([
			'type'						=> 'standard',
			'price'           => 0.00,
			'size'            => 50,
			'shoulders_front' => 18.6,
			'pits_across'     => 21.9,
			'mid'             => 19.9,
			'waist'           => 20.4,
			'front_length'    => 23.5,
			'back_length'     => 25.5,
			'sleeve_length'   => 26.6,
			'width_at_pit'    => 7.7,
			'width_at_elbow'  => 6.7,
			'width_at_cuff'   => 5.7,
			'shoulder'        => null,
			'chest'           => null,
			'biceps'          => null,
			'note'            => ''
		]);

		Measurement::create([
			'type'						=> 'standard',
			'price'           => 0.00,
			'size'            => 52,
			'shoulders_front' => 19.2,
			'pits_across'     => 22.8,
			'mid'             => 20.8,
			'waist'           => 21.3,
			'front_length'    => 24.6,
			'back_length'     => 26.8,
			'sleeve_length'   => 27.8,
			'width_at_pit'    => 8.1,
			'width_at_elbow'  => 6.9,
			'width_at_cuff'   => 5.8,
			'shoulder'        => null,
			'chest'           => null,
			'biceps'          => null,
			'note'            => ''
		]);

		Measurement::create([
			'type'						=> 'standard',
			'price'           => 0.00,
			'size'            => 54,
			'shoulders_front' => 19.8,
			'pits_across'     => 23.9,
			'mid'             => 21.7,
			'waist'           => 22.2,
			'front_length'    => 25.5,
			'back_length'     => 27.8,
			'sleeve_length'   => 29,
			'width_at_pit'    => 8.3,
			'width_at_elbow'  => 7.2,
			'width_at_cuff'   => 5.9,
			'shoulder'        => null,
			'chest'           => null,
			'biceps'          => null,
			'note'            => ''
		]);



	}

}
