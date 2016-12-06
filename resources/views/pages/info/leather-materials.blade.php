@extends("layouts/default")

@section("title")
Our Leather &amp; Materials
@stop

@section("description")
{{-- NEED UPDATED DESCRIPTION!!! --}}
Learn more about our full-grain, vegetable tanned leather.
@stop

@section("header")
	<a ng-click="displayMenu = false">Our Leather &amp; Materials</a>
@stop

@section("main")
	<section class="small-12 medium-10 large-8 medium-centered columns">
		<a href="/images/photos/leather/leather_hero-lg.jpg" title="">
  		<img class="responsive-image" src="/images/photos/leather/leather_hero-md.jpg" alt="Our Leather">
	  </a>
	</section>
	<article class="large-12 medium-12 small-12 columns">
		@include('partials.info.leather-accordion')
	</article>
	<article class="large-12 medium-12 small-12 columns">
		@include('partials.info.leather')
		<hr class="thin">
		@include('partials.info.lining')
		<hr class="thin">
		@include('partials.info.hardware')
		<hr class="thin">
		<section class="row">
			<div class="large-6 medium-6 small-12 columns">
				<a href="/images/photos/linings/lining-lg.jpg" class="image-link"><img class="sidekick-image" src="/images/photos/linings/lining-md.jpg" alt="Lining"></a>
			</div>
			<div class="large-6 medium-6 small-12 columns">
				<a href="/images/photos/other/craftsmanship-lg.jpg" class="image-link"><img class="sidekick-image" src="/images/photos/other/craftsmanship-md.jpg" alt="Craftsmanship"></a>
			</div>
		</section>
		<hr class="thin">
		@include('partials.info.knits')
		<hr class="thin">
		@include('partials.info.collar')
	</article>
@stop