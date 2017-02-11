@extends('layouts/jacket')

@section("page_wrap_class")
	nav-item-page
@stop

@section('title')
Mott
@stop

@section('description')
Cafe racer (Moto) leather jacket
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
      <a href="/images/photos/jackets/mott/carousel/{{{ $name }}}-large.jpg" title="">
        <img src="/images/photos/jackets/mott/carousel/{{{ $name }}}-medium.jpg" alt="{{{ $name }}}">
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
    @foreach (['collar', 'cuff-zipper', 'pocket'] as $name)
      <img class="large-6 medium-6 small-12 columns" src="/images/photos/jackets/mott/details/{{{ $name }}}.jpg" alt="{{{ $name }}}">
    @endforeach
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