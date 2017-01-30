@extends('layouts/jacket')

@section("page_wrap_class")
	nav-item-page
@stop

@section('title')
Bleecker
@stop

@section('description')
Our made-to-measure double rider biker leather jacket.
@stop

@section('carousel_images')
  <div>
  	<a href="/images/photos/jackets/bleecker/carousel/front_closed_silver_large.jpg" title="">
  	<img src="/images/photos/jackets/bleecker/carousel/front_closed_silver_medium.jpg" alt="Front Closed Silver">
  </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/bleecker/carousel/45-left_closed_silver_large.jpg" title="">
  	<img src="/images/photos/jackets/bleecker/carousel/45-left_closed_silver_medium.jpg" alt="45 Left Closed Silver">
  </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/bleecker/carousel/side-left_closed_silver_large.jpg" title="">
  	<img src="/images/photos/jackets/bleecker/carousel/side-left_closed_silver_large.jpg" alt="Side left Closed Silver">
  </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/bleecker/carousel/back_closed_silver_large.jpg" title="">
  	<img src="/images/photos/jackets/bleecker/carousel/back_closed_silver_medium.jpg" alt="Back Closed Silver">
	  </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/bleecker/carousel/front_open_silver_large.jpg" title="">
  	<img src="/images/photos/jackets/bleecker/carousel/front_open_silver_medium.jpg" alt="Front Open Silver">
	  </a>
  </div>
@stop

@section('measurement_data')
	<?php
	  $body_measurements = [
			'height'        => 186,
			'half_shoulder' => 14,
			'back_width'    => 40.5,
			'chest'         => 99,
			'stomach'				=> 78.5,
			'back_length'   => 54,
			'waist'         => 85,
			'arm'           => 64,
			'biceps'        => 33.5
	  ];
	  $jacket_measurements = [
			'height'        => '',
			'half_shoulder' => 15,
			'back_width'    => '',
			'chest'         => 104,
			'stomach'				=> 96,
			'back_length'   => 59,
			'waist'         => 94,
			'arm'           => 66,
			'biceps'        => 38
	  ];
		$video_adjustments = [
			'shoulders' => '-2.5',
			'waist'     => '-2.5',
		];
		$model_size = 50;
	?>
@stop

@section('main')
  <div class="row">
    <img class="large-6 medium-6 small-12 columns" src="/images/photos/jackets/bleecker/details/actionback.jpg" alt="Actionback">
    <img class="large-6 medium-6 small-12 columns" src="/images/photos/jackets/bleecker/details/chest.jpg" alt="Chest">
    <img class="large-6 medium-6 small-12 columns" src="/images/photos/jackets/bleecker/details/cuff-zipper.jpg" alt="Cuff Zipper">
    <div class="large-6 medium-6 small-12 columns">
      <br>
      <h2>Finest materials</h2>
      <p>
        From the most precious leather down to the zippers and buttons, we obsess over the quality of the materials we use.
        <br>
        <a href="/materials?jacket={{{ $jacket->model }}}" class="underlined">Learn more</a>
      </p>
    </div>
  </div>
@stop