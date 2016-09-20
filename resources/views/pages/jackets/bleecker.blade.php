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
  	<a href="/images/photos/jackets/bleecker/carousel/front_closed_full-silver-large.jpg" title="">
  	<img class="responsive-image" src="/images/photos/jackets/bleecker/carousel/front_closed_full-silver-medium.jpg" alt="Front Closed Full Silver">
  </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/bleecker/carousel/side_right_closed_full-silver-large.jpg" title="">
  	<img class="responsive-image" src="/images/photos/jackets/bleecker/carousel/side_right_closed_full-silver-medium.jpg" alt="Side Right Closed Full Silver">
  </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/bleecker/carousel/back_closed_full-silver-large.jpg" title="">
  	<img class="responsive-image" src="/images/photos/jackets/bleecker/carousel/back_closed_full-silver-medium.jpg" alt="Back Closed Full Silver">
  </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/bleecker/carousel/shoulder_detail-silver-large.jpg" title="">
  	<img class="responsive-image" src="/images/photos/jackets/bleecker/carousel/shoulder_detail-silver-medium.jpg" alt="Shoulder Detail Silver">
	  </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/bleecker/carousel/sleeve_detail-silver-large.jpg" title="">
  	<img class="responsive-image" src="/images/photos/jackets/bleecker/carousel/sleeve_detail-silver-medium.jpg" alt="Sleeve Detail Silver">
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
	<article class="large-12 medium-12 small-12 columns">
		<h2>Finest Materials</h2>
		<p>
			From the most precious leather down to the zippers and buttons, we obsess over the quality of the materials we use.
			<a href="/leather-materials?jacket={{{ $jacket->model }}}" class="underlined">Learn more</a>
		</p>
	</article>
@stop