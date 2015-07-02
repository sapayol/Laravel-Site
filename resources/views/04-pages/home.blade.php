@extends('03-templates/default')

@section('title')
  Home
@stop

@section('main')
	<div class="large-12 medium-12 small-12 columns text-center hero-image-container">
		<img class="hero-image" src="images/photos/jacket-full_body-profile.jpg" alt="">
		<h1 class="hero-text">
			<span class="line2 thin">Luxury</span><br>
			<span class="line1 thin">Tailor Made</span><br>
			<strong class="line3">Leather Jackets</strong>
		</h1>
	</div>

	<section class="large-12 medium-12 small-12 columns">
		<a href="/jackets/bomber" class="button black expand call-to-action">See Our Collection</a>

		<article>
			<a href="/how-it-works"><img class="sidekick-image" src="/images/photos/tailor-supplies.jpg" alt=""></a>
			<h2 class="thin"><a href="/how-it-works">Made-to-Measure</a></h2>
			<p>Your jacket is made exclusively for you, based on your measurements. It will fit you perfectly.</p>
		</article>

		<article>
			<a href="/who-we-are"><img class="sidekick-image" src="/images/photos/tailor-at-work.jpg" alt=""></a>
			<h2 class="thin"><a href="/who-we-are">Master Craftsmanship</a></h2>
			<p>Each piece is made at a select workshop, where the same craftsmen and -women have been perfecting their art together for centuries.</p>
		</article>

		<article>
			<a href="/who-we-are"><img class="sidekick-image" src="/images/photos/zipper-brown.jpg" alt=""></a>
			<h2 class="thin"><a href="/who-we-are">Finest Materials</a></h2>
			<p>From the most precious leather down to the zippers and buttons, we obsess over the quality of the materials we use.</p>
		</article>

		<article>
			<a href="/who-we-are"><img class="sidekick-image" src="/images/photos/tannery.jpg" alt=""></a>
			<h2 class="thin">Respect for People and Nature</h2>
			<p>A deep concern for work conditions, our environment, and animals guides every decision we take.</p>
			<a class="underlined" href="/who-we-are">Find Out More</a>
		</article>

		<a href="/jackets/bomber" class="button radius expand">Get a Jacket Now</a>
	</section>

@stop

@section('footer')
	<div class="alert-box info" data-alert >
	  <h3><strong><small>Page Description</small></strong></h3>
		<h4>
			<small>
				Communicate instantly what the site is selling and highlight the content areas that are most important to the brand.
			</small>
		</h4>

		<h3><strong><small>Purpose Served</small></strong></h3>
		<h4>
			<small>
				Get the audience to explore the jacket and customization options. Make them curious about the materials used and the process.
			</small>
		</h4>
  	<a href="#" class="close">&times;</a>
	</div>
@stop