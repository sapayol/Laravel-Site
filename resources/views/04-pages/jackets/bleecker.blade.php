@extends('03-templates/jacket')

@section('title')
	Bleecker
@stop

@section('carousel_images')
  <div><img src="/images/photos/jackets/bleecker/front_open_full_silver.jpg" alt=""></div>
  <div><img src="/images/photos/jackets/bleecker/left_closed_full_silver.jpg" alt=""></div>
  <div><img src="/images/photos/jackets/bleecker/side_left_closed_full_silver.jpg" alt=""></div>
  <div><img src="/images/photos/jackets/bleecker/back_closed_full_silver.jpg" alt=""></div>
  <div><img src="/images/photos/jackets/bleecker/side_right_closed_full_silver.jpg" alt=""></div>
  <div><img src="/images/photos/jackets/bleecker/right_closed_full_silver.jpg" alt=""></div>
@stop

@section('measurement_chart')
	<?php
		$video_measurements = [
			'column1' => [
				'height'        => 186,
				'half_shoulder' => 15,
				'back_width'    => 46,
				'chest'         => 40,
				'waist'         => 100
			],
			'column2' => [
				'hip'           => 77,
				'back_length'   => 95,
				'arm'           => 63,
				'biceps'        => 35
			]
		];
		$video_adjustments = [
			'shoulders' => '-2.5',
			'waist'     => '-2.5',
		];
		$model_size = 50;
	?>
@stop

@section('main')
	<section class="small-12 medium-12 large-12 columns">
		<h2 class="thin">Inside pockets for your valuables</h2>
		<a href="/images/photos/jackets/bleecker/interior-pocket-right-square.jpg"><img class="sidekick-image" src="/images/photos/jackets/bleecker/interior-pocket-right-square.jpg" alt=""></a>
		<p class="image-caption">An inside pocket with a zipper on your right chest holds your note book, Knicks tickets, pay check, or passport.</p>
		<a href="/images/photos/jackets/bleecker/interior-pocket-left-square.jpg"><img class="sidekick-image" src="/images/photos/jackets/bleecker/interior-pocket-left-square.jpg" alt=""></a>
		<p class="image-caption">Slide your phone into a welted pocket that sits conveniently just inside your jacket, on the left side.</p>
		<h3>Reinforced pockets</h3>
		<p>All pockets are lined with a Tencel twill, a very strong, eco-friendly fabric that makes sure you don’t lose your keys.</p>
	</section>
@stop