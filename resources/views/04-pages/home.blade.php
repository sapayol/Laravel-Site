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
		<article>
			<a href="/images/photos/tailor-supplies.jpg"><img class="sidekick-image" src="/images/photos/tailor-supplies.jpg" alt=""></a>
			<h2 class="thin">Made-to-Measure</h2>
			<p>Your jacket is made exclusively for you, based on your measurements. It will fit you perfectly.</p>
		</article>

		<article>
			<a href="/images/photos/tailor-at-work.jpg"><img class="sidekick-image" src="/images/photos/tailor-at-work.jpg" alt=""></a>
			<h2 class="thin">Master Craftsmanship</h2>
			<p>Each piece is made at a select workshop, where the same craftsmen and -women have been perfecting their art together for centuries.</p>
		</article>

		<article>
			<a href="/images/photos/zipper-brown.jpg"><img class="sidekick-image" src="/images/photos/zipper-brown.jpg" alt=""></a>
			<h2 class="thin">Finest Materials</h2>
			<p>From the most precious leather down to the zippers and buttons, we obsess over the quality of the materials we use.</p>
		</article>

		<article>
			<a href="/images/photos/zipper-brown.jpg"><img class="sidekick-image" src="/images/photos/tannery.jpg" alt=""></a>
			<h2 class="thin">Respect For People and Nature</h2>
			<p>A deep concern for work conditions, our environment, and animals guides every decision we take.</p>
		</article>
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
		<h3><strong><small>Components</small></strong></h3>
		<h4>
			<small>
				- main heading on top of image/video <br>
				- subheadings under or on top of images <br>
				- short paragraph about the content that the image links to
			</small>
		</h4>
  	<a href="#" class="close">&times;</a>
	</div>
@stop