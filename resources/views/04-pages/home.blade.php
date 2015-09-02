@extends('03-templates/default')

@section('title')
  Home
@stop

@section('full-width-hero')
	<div class="homepage-hero-module">
		<div class="video-container">
			<div class="title-container">
				<h1 class="hero-text">
					<span class="line1 thin">Tailor-made</span><br>
					<strong class="line3">Leather Jackets</strong>
				</h1>
				<a href="/jackets" class="button call-to-action inverted-colors">See Our Collection</a>
			</div>
			<video autoplay class="fillWidth" poster="/images/video-posters/hero_short.png">
				<source src="/videos/hero_short.mp4" type="video/mp4" />
				<source src="/videos/hero_short.webm" type="video/webm" />
				Your browser does not support the video tag. I suggest you upgrade your browser.
			</video>
			<div class="poster hidden">
				<img src="/images/video-posters/hero_short.png" alt="">
			</div>
		</div>
	</div>
@stop

@section('main')
	<section class="large-12 medium-12 small-12 columns">
		<article>
			<a href="/how-it-works"><img class="responsive-image" src="/images/photos/other/made-to-measure.jpg" alt=""></a>
			<h2 class="thin">Made-to-Measure</h2>
			<p>
				Your jacket is made exclusively for you, based on your measurements. It will fit you perfectly.<br>
			</p>
			<a class="underlined" href="/how-it-works">Find Out More</a>
		</article>

		<article>
			<a href="/who-we-are"><img class="sidekick-image" src="/images/photos/other/master-craftsmanship.jpg" alt=""></a>
			<h2 class="thin">Master Craftsmanship</h2>
			<p>Each piece is made at a select workshop, where the same craftsmen and -women have been perfecting their art together for centuries.<br>
			</p>
			<a class="underlined" href="/who-we-are">Find Out More</a>
		</article>

		<article>
			<a href="/who-we-are"><img class="sidekick-image" src="/images/photos/other/finest-materials.jpg" alt=""></a>
			<h2 class="thin">Finest Materials</h2>
			<p>
				From the most precious leather down to the zippers and buttons, we obsess over the quality of the materials we use.<br>
			</p>
			<a class="underlined" href="/our-leather">Find Out More</a>
		</article>

		<article>
			<a href="/who-we-are"><img class="sidekick-image" src="/images/photos/other/respect-for-nature.jpg" alt=""></a>
			<h2 class="thin">Respect for People and Nature</h2>
			<p>
				A deep concern for work conditions, our environment, and animals guides every decision we take.<br>
			</p>
			<a class="underlined" href="/who-we-are">Find Out More</a>
		</article>

		<a href="/jackets" class="button hollow expand">Get a Jacket Now</a>
	</section>

@stop