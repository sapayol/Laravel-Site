@extends('layouts/jacket')

@section("page_wrap_class")
	nav-item-page
@stop

@section('title')
Linden
@stop

@section('description')
Our made-to-measure double rider biker leather jacket.
@stop

@section('carousel_images')
  <div>
  	<a href="/images/photos/jackets/linden/carousel/front_closed-silver-lg.jpg" title="">
    	<img class="responsive-image" src="/images/photos/jackets/linden/carousel/front_closed-silver-md.jpg" alt="Front Closed Silver">
    </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/linden/carousel/right_profile_closed-silver-lg.jpg" title="">
    	<img class="responsive-image" src="/images/photos/jackets/linden/carousel/right_profile_closed-silver-md.jpg" alt="Right Profile Closed Silver">
    </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/linden/carousel/back_closed-silver-lg.jpg" title="">
    	<img class="responsive-image" src="/images/photos/jackets/linden/carousel/back_closed-silver-md.jpg" alt="Back Closed Silver">
    </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/linden/carousel/collar_detail-silver-lg.jpg" title="">
    	<img class="responsive-image" src="/images/photos/jackets/linden/carousel/collar_detail-silver-md.jpg" alt="Collar Detail Silver">
	  </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/linden/carousel/pocket_detail-silver-lg.jpg" title="">
    	<img class="responsive-image" src="/images/photos/jackets/linden/carousel/pocket_detail-silver-md.jpg" alt="Sleeve Detail Silver">
	  </a>
  </div>
  <div>
  	<a href="/images/photos/jackets/linden/carousel/inner_pocket_detail-silver-lg.jpg" title="">
  	 <img class="responsive-image" src="/images/photos/jackets/linden/carousel/inner_pocket_detail-silver-md.jpg" alt="Inner Pocket Detail Silver">
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
    <a class="large-6 medium-6 small-12 columns" href="/images/photos/jackets/linden/details/collar-lg.jpg" title="">
      <img class="responsive-image" src="/images/photos/jackets/linden/details/collar-md.jpg" alt="Collar">
    </a>
    <a class="large-6 medium-6 small-12 columns" href="/images/photos/jackets/linden/details/pocket-lg.jpg" title="">
      <img class="responsive-image" src="/images/photos/jackets/linden/details/pocket-md.jpg" alt="Pocket">
    </a>
    <a class="large-6 medium-6 small-12 columns" href="/images/photos/jackets/linden/details/knits-lg.jpg" title="">
      <img class="responsive-image" src="/images/photos/jackets/linden/details/knits-md.jpg" alt="Knits">
    </a>
    <div class="large-6 medium-6 small-12 columns">
      <h2>Finest materials</h2>
      <p>
        From the most precious leather down to the zippers and buttons, we obsess over the quality of the materials we use.
        <br>
        <a href="/leather-materials?jacket={{{ $jacket->model }}}" class="underlined">Learn more</a>
      </p>
    </div>
  </div>
@stop