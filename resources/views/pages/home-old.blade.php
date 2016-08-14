@extends('layouts/home')

@section('page_wrap_class')
	headless-page
@stop

@section('title')
Leather Jackets
@stop

@section('description')
SAPAYOL offers made-to-measure, customizable leather jackets, tailored by master craftsmen from the finest vegetable tanned leather.
@stop

@section('full-width-hero')
	<div class="hero-image-container">
		<div class="filter">
			<div class="title-container">
				<h1 class="hero-text">
					<span class="line1 thin">Tailor&ndash;made</span><br>
					<span class="line3">Leather Jackets</span>
				</h1>
				<a href="/jackets" class="button call-to-action">See Our Collection</a>
			</div>
		</div>
	</div>
@stop

@section('main')

{{-- 		<section class="small-12 medium-12 large-12 columns">
			<div class="player" ng-controller="videoCtrl">
			  <video poster="/images/video-posters/home_page.jpg" controls crossorigin>
			    <source src="/videos/home_page.webm" type="video/webm">
			    <source src="/videos/home_page.mp4"  type="video/mp4">
			    <a href="/videos/home_page.mp4">Download</a>
			  </video>
			</div>
		</section>
 --}}
		<div class="row wide">
		<article class="large-6 medium-6 small-12 columns">
			<a href="/who-we-are#master-craftsmanship" class="image-link"><img class="sidekick-image" src="/images/photos/other/master-craftsmanship.jpg" alt="Master Craftsmanship"></a>
			<h2 class="thin">Master Craftsmanship</h2>
			<p>Each piece is made at a select workshop, where the same craftsmen and <span class="no-wrap">&ndash;women</span> have been perfecting their art together for decades.<br>
			</p>
			<a class="underlined" href="/who-we-are#master-craftsmanship">Find Out More</a>
			<br><br><br>
		</article>
		<article class="large-6 medium-6 small-12 columns">
			<a href="/how-it-works" class="image-link"><img class="sidekick-image" src="/images/photos/other/made-to-measure.jpg" alt="Made to Measure"></a>
			<h2 class="thin">Made&ndash;to&ndash;Measure</h2>
			<p>
				Your jacket is made exclusively for you, based on your measurements. It will fit you perfectly.<br>
			</p>
			<a class="underlined" href="/how-it-works">Find Out More</a>
			<br><br><br>
		</article>

		<div class="clearfix"></div>
		<article class="large-6 medium-6 small-12 columns">
			<a href="/who-we-are#best-materials" class="image-link"><img class="sidekick-image" src="/images/photos/other/finest-materials.jpg" alt="Finest Materials"></a>
			<h2 class="thin">Finest Materials</h2>
			<p>
				From the most precious leather down to the zippers and buttons, we obsess over the quality of the materials we use.<br>
			</p>
			<a class="underlined" href="/who-we-are#best-materials">Find Out More</a>
			<br><br><br>
		</article>

		<article class="large-6 medium-6 small-12 columns">
			<a href="/who-we-are#respect-nature" class="image-link"><img class="sidekick-image" src="/images/photos/other/respect-for-people.jpg" alt="Respect for People and Nature"></a>
			<h2 class="thin">Respect for People and Nature</h2>
			<p>
				A deep concern for work conditions, our environment, and animals guides every decision we take.<br>
			</p>
			<a class="underlined" href="/who-we-are#respect-nature">Find Out More</a>
		</article>

</div>
		<section class="large-8 medium-10 small-12 medium-centered columns">
			<a href="/jackets" class="button hollow expand call-to-action">Get a Jacket Now</a>
		</section>


@stop