@extends('layouts/jacket')

@section("page_wrap_class")
	nav-item-page
@stop

@section('title')
	Bleecker
@stop

@section('carousel_images')
  <div><a href="/images/photos/jackets/bleecker/carousel/right_closed_full_silver-medium.jpg" title=""><img class="responsive-image" src="/images/photos/jackets/bleecker/carousel/right_closed_full_silver-medium.jpg" alt=""></a></div>
  <div><a href="/images/photos/jackets/bleecker/carousel/front_open_full_silver-medium.jpg" title=""><img class="responsive-image" src="/images/photos/jackets/bleecker/carousel/front_open_full_silver-medium.jpg" alt=""></a></div>
  <div><a href="/images/photos/jackets/bleecker/carousel/left_closed_full_silver-medium.jpg" title=""><img class="responsive-image" src="/images/photos/jackets/bleecker/carousel/left_closed_full_silver-medium.jpg" alt=""></a></div>
  <div><a href="/images/photos/jackets/bleecker/carousel/side_left_closed_full_silver-medium.jpg" title=""><img class="responsive-image" src="/images/photos/jackets/bleecker/carousel/side_left_closed_full_silver-medium.jpg" alt=""></a></div>
  <div><a href="/images/photos/jackets/bleecker/carousel/back_closed_full_silver-medium.jpg" title=""><img class="responsive-image" src="/images/photos/jackets/bleecker/carousel/back_closed_full_silver-medium.jpg" alt=""></a></div>
  <div><a href="/images/photos/jackets/bleecker/carousel/side_right_closed_full_silver-medium.jpg" title=""><img class="responsive-image" src="/images/photos/jackets/bleecker/carousel/side_right_closed_full_silver-medium.jpg" alt=""></a></div>
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

	<section class="row flex-section">
		<div class="large-6 medium-12 small-12 columns">
			<a href="/images/photos/leather/lamb_c_black_close-up.jpg" class="image-link"><img class="sidekick-image" src="/images/photos/leather/lamb_c_black_close-up.jpg" alt=""></a>
		</div>
		<div class="large-6 medium-12 small-12 columns">
			<br>
			<h2>Vegetable tanned, chrome&ndash;free, full&ndash;grain leather</h2>
			<p>All our jackets are made with the most exclusive, vegetable tanned, full&ndash;grain leather. It’s supple, thick, has a warm touch, and a pleasant smell. With good care, it will not crack or bulge for decades but break in and develop a beautiful patina.</p>
			<p>Our leather is also absolutely free of the chromium salts that can become carcinogenic, found in almost every other leather garment.</p>
			<br>
			<div class="text-left">
				<a href="/our-leather?jacket={{{ $jacket->model }}}" class="underlined" title="">Learn more about what makes our leather so special</a><br><br>
			</div>
		</div>
	</section>

	<hr class="thin">

	<section class="row">
		<h2 class="text-center">Inside pockets for your valuables</h2>
		<br>
		<br>
		<div class="large-6 medium-12 small-12 columns">
			<a href="/images/photos/jackets/bleecker/interior-pocket-left-square.jpg" class="image-link"><img class="sidekick-image" src="/images/photos/jackets/bleecker/interior-pocket-left-square.jpg" alt=""></a>
			<p class="image-caption">Slide your phone into a welted pocket that sits conveniently just inside your jacket, on the left side.</p>
		</div>

		<div class="large-6 medium-12 small-12 columns">
			<a href="/images/photos/jackets/bleecker/interior-pocket-right-square.jpg" class="image-link"><img class="sidekick-image" src="/images/photos/jackets/bleecker/interior-pocket-right-square.jpg" alt=""></a>

			<p class="image-caption">An inside pocket with a zipper on your right chest holds your note book, Knicks tickets, pay check, or passport.</p>
		</div>
		<br>
		<p class="text-center"> <em>All pockets are lined with a Tencel twill, a very strong, eco&ndash;friendly fabric that makes sure you don’t lose your keys.</em></p>
	</section>

	<hr class="thin">

	<section class="row flex-section">
		<div class="large-6 medium-6 small-12 columns">
			<a href="/images/photos/linings/bemberg_oxford_black_close-up.jpg" class="image-link"><img class="sidekick-image" src="/images/photos/linings/bemberg_oxford_black_close-up.jpg" alt=""></a>
		</div>
		<div class="large-6 medium-6 small-12 columns">
			<h2>Silky, breathable lining</h2>
			<p>We chose a 100% Bemberg Cupro oxford weave for our lining. No other fabric breathes as well, absorbs and releases sweat as quickly, and is at the same time as smooth as silk. It’s the top lining choice of bespoke suit makers.</p>
		</div>
	</section>

	<hr class="thin">

	<section class="row">
		<h2 class="text-center">Super smooth and reliable hardware</h2><br><br>
		<div class="large-6 medium-6 small-12 columns">
			<a href="/images/photos/hardware/zipper_silver_detail.jpg" class="image-link"><img class="sidekick-image" src="/images/photos/hardware/zipper_silver_detail.jpg" alt=""></a>
			<p class="image-caption">All zippers are YKK Excella. They combine legendary reliability with smooth elegance. Each tooth is individually polished, which gives the zipper a brilliant shine and prevents scratching of the jacket or your skin.
				<br>
				<br>
				YKK Excella zippers don’t contain Nickel.
			</p>
		</div>
		<div class="large-6 medium-6 small-12 columns">
			<a href="/images/photos/hardware/snap_silver_detail.jpg" class="image-link"><img class="sidekick-image" src="/images/photos/hardware/snap_silver_detail.jpg" alt=""></a>
			<p class="image-caption">The buttons on our jackets are spring&ndash;type snaps from YKK, made purely out of nickel&ndash;free alloys. They receive the same beautiful coatings as our zippers and provide reliable closure without the need to pull too hard and damage the leather when you open them.</p>
		</div>
	</section>
</article>

@stop