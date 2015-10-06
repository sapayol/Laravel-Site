@extends('layouts/default')

@section('angular_page_controller')
	homeCtrl
@stop

@section('page_wrap_class')
	headless-page
@stop

@section('title')
  Home
@stop

@section('full-width-hero')
		<div class="hero-video-container">
			<div class="filter">
				<div class="title-container">
					<h1 class="hero-text">
						<span class="line1 thin">Tailor-made</span><br>
						<span class="line3">Leather Jackets</span>
					</h1>
					<a href="/jackets" class="button call-to-action">See Our Collection</a>
				</div>
			</div>
			<video autoplay class="fillWidth" poster="/images/video-posters/hero_short.png">
				<source src="/videos/hero_short.webm" type="video/webm"/>
				<source src="/videos/hero_short.mp4" type="video/mp4"/>
				Your browser does not support the video tag. I suggest you upgrade your browser.
			</video>
			<div class="poster hidden">
				<img src="/images/video-posters/hero_short.png" alt="">
			</div>
		</div>
@stop

@section('main')
	<article class="large-6 medium-6 small-12 columns">
		<a href="/how-it-works" class="image-link"><img class="sidekick-image" src="/images/photos/other/made-to-measure.jpg" alt=""></a>
		<h2 class="thin">Made-to-Measure</h2>
		<p>
			Your jacket is made exclusively for you, based on your measurements. It will fit you perfectly.<br>
		</p>
		<a class="underlined" href="/how-it-works">Find Out More</a>
	</article>

	<article class="large-6 medium-6 small-12 columns">
		<a href="/who-we-are" class="image-link"><img class="sidekick-image" src="/images/photos/other/master-craftsmanship.jpg" alt=""></a>
		<h2 class="thin">Master Craftsmanship</h2>
		<p>Each piece is made at a select workshop, where the same craftsmen and -women have been perfecting their art together for decades.<br>
		</p>
		<a class="underlined" href="/who-we-are">Find Out More</a>
	</article>

	<article class="large-6 medium-6 small-12 columns">
		<a href="/who-we-are" class="image-link"><img class="sidekick-image" src="/images/photos/other/finest-materials.jpg" alt=""></a>
		<h2 class="thin">Finest Materials</h2>
		<p>
			From the most precious leather down to the zippers and buttons, we obsess over the quality of the materials we use.<br>
		</p>
		<a class="underlined" href="/our-leather">Find Out More</a>
	</article>

	<article class="large-6 medium-6 small-12 columns">
		<a href="/who-we-are" class="image-link"><img class="sidekick-image" src="/images/photos/other/respect-for-nature.jpg" alt=""></a>
		<h2 class="thin">Respect for People and Nature</h2>
		<p>
			A deep concern for work conditions, our environment, and animals guides every decision we take.<br>
		</p>
		<a class="underlined" href="/who-we-are">Find Out More</a>
	</article>

	<section class="large-6 medium-6 small-12 large-centered medium-centered columns">
		<a href="/jackets" class="button hollow expand call-to-action">Get a Jacket Now</a>
	</section>

@stop