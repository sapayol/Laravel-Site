@extends('layouts/jacket')

@section("page_wrap_class")
	nav-item-page
@stop

@section('title')
E-161
@stop

@section('description')
Our made-to-measure double rider biker leather jacket.
@stop

@section('carousel_images')
  <?php
    $carouselImageNames = [
      'front_closed_silver',
      '45-left_closed_silver',
      'side-left_closed_silver',
      'back_closed_silver',
      'front_open_silver',
    ]
  ?>

  @foreach ($carouselImageNames as $name)
    <div>
      <a href="/images/photos/jackets/e-161/carousel/{{{ $name }}}_large.jpg" title="">
        <img
          class="responsive-image"
          src="/images/photos/jackets/e-161/carousel/{{{ $name }}}_medium.jpg" alt="{{{ $name }}}">
      </a>
    </div>
  @endforeach
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
    @foreach (['collar', 'interior-pocket', 'waist'] as $name)
      <img class="large-6 medium-6 small-12 columns responsive-image" src="/images/photos/jackets/e-161/details/{{{ $name }}}.jpg" alt="{{{ $name }}}">
    @endforeach
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