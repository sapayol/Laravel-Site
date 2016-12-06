@extends('layouts/jacket')

@section("page_wrap_class")
	nav-item-page
@stop

@section('title')
Mott
@stop

@section('description')
Our made-to-measure double rider biker leather jacket.
@stop

@section('carousel_images')
  <div>
  	<a href="/images/photos/jackets/mott/carousel/front_closed_full-silver-large.jpg" title="">
  	<img class="responsive-image" src="/images/photos/jackets/mott/carousel/front_closed_full-silver-medium.jpg" alt="Front Closed Full Silver">
  </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/mott/carousel/side_right_closed_full-silver-large.jpg" title="">
  	<img class="responsive-image" src="/images/photos/jackets/mott/carousel/side_right_closed_full-silver-medium.jpg" alt="Side Right Closed Full Silver">
  </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/mott/carousel/back_closed_full-silver-large.jpg" title="">
  	<img class="responsive-image" src="/images/photos/jackets/mott/carousel/back_closed_full-silver-medium.jpg" alt="Back Closed Full Silver">
  </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/mott/carousel/shoulder_detail-silver-large.jpg" title="">
  	<img class="responsive-image" src="/images/photos/jackets/mott/carousel/collar_detail-silver-medium.jpg" alt="Collar Detail Silver">
	  </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/mott/carousel/sleeve_detail-silver-large.jpg" title="">
  	<img class="responsive-image" src="/images/photos/jackets/mott/carousel/sleeve_detail-silver-medium.jpg" alt="Sleeve Detail Silver">
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
    <a class="large-6 medium-6 small-12 columns" href="/images/photos/jackets/mott/details/zipper-lg.jpg" title="">
      <img class="responsive-image" src="/images/photos/jackets/mott/details/zipper-md.jpg" alt="Zipper">
    </a>
    <a class="large-6 medium-6 small-12 columns" href="/images/photos/jackets/mott/details/sleeve-lg.jpg" title="">
      <img class="responsive-image" src="/images/photos/jackets/mott/details/sleeve-md.jpg" alt="Sleeve">
    </a>
    <a class="large-6 medium-6 small-12 columns" href="/images/photos/jackets/mott/details/pocket-lg.jpg" title="">
      <img class="responsive-image" src="/images/photos/jackets/mott/details/pocket-md.jpg" alt="Pocket">
    </a>
    <div class="large-6 medium-6 small-12 columns">
      <h2>Finest materials</h2>
      <p>
        From the most precious leather down to the zippers and buttons, we obsess over the quality of the materials we use. <a href="/leather-materials?jacket={{{ $jacket->model }}}" class="underlined">Learn more</a>
      </p>
    </div>
  </div>
@stop