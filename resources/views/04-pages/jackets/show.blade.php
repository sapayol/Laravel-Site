@extends('03-templates/default')

@section('title')
	{{{ $jacket->name }}}
@stop


@section('main')
	<section class="small-12 medium-12 large-12 columns carousel-container">
		<div class="home-carousel" >
		  <div><img src="/images/photos/model-front.jpg" alt=""></div>
		  <div><img src="/images/photos/model-right-profile-open.jpg" alt=""></div>
		  <div><img src="/images/photos/model-right.jpg" alt=""></div>
		  <div><img src="/images/photos/model-back.jpg" alt=""></div>
		  <div><img src="/images/photos/model-left.jpg" alt=""></div>
		  <div><img src="/images/photos/model-left-profile-closed.jpg" alt=""></div>
		</div>
	</section>

	<section class="small-12 medium-12 large-12 columns text-center">
		<h1 class="with-subheading">{{{ $jacket->name }}}</h1>
		<span class="thin large-price">${{{ number_format($jacket->price) }}}<small> USD</small></span>
		<a href="{!! route('jackets.look', $jacket->model) !!}" class="button black expand call-to-action">
			Customize Yours Now <span class="chevron chevron--right"></span>
		</a>
	</section>


	<section class="small-12 medium-12 large-12 columns">
		<div class="flex-video">
	    <iframe width="420" height="315" src="//www.youtube.com/embed/qcM8H08LFKM?rel=0&modestbranding=1&autohide=1&showinfo=0&controls=0"  frameborder="0" allowfullscreen></iframe>
		</div>
		<a class="video-caption" ng-show="!measurementsVisible" ng-click="measurementsVisible = !measurementsVisible">Measurements Seen In the Video </a>
	</section>

	<section ng-show="measurementsVisible" class="small-12 medium-12 large-12 columns">
		<ul ng-if="metricUnits" class="no-bullet value-list large-6 medium-6 small-6 columns">
			<li><span class="value-key thin">Height</span>     186 <small>cm</small></li>
			<li><span class="value-key thin">Shoulder 1</span> 15  <small>cm</small></li>
			<li><span class="value-key thin">Shoulder 2</span> 46  <small>cm</small></li>
			<li><span class="value-key thin">Back</span>       40  <small>cm</small></li>
			<li><span class="value-key thin">Chest</span>      100 <small>cm</small></li>
		</ul>
		<ul ng-if="metricUnits" class="no-bullet value-list  large-6 medium-6 small-6 columns">
			<li><span class="value-key thin">Waist</span>  77 <small>cm</small></li>
			<li><span class="value-key thin">Hip</span>    95 <small>cm</small></li>
			<li><span class="value-key thin">Length</span> 60 <small>cm</small></li>
			<li><span class="value-key thin">Sleeve</span> 63 <small>cm</small></li>
			<li><span class="value-key thin">Biceps</span> 35 <small>cm</small></li>
		</ul>
		<ul ng-if="!metricUnits" class="no-bullet value-list large-6 medium-6 small-6 columns">
			<li><span class="value-key thin">Height</span>     73.23 <small>in</small></li>
			<li><span class="value-key thin">Shoulder 1</span> 5.91  <small>in</small></li>
			<li><span class="value-key thin">Shoulder 2</span> 18.11  <small>in</small></li>
			<li><span class="value-key thin">Back</span>       15.75  <small>in</small></li>
			<li><span class="value-key thin">Chest</span>      39.37 <small>in</small></li>
		</ul>
		<ul ng-if="!metricUnits" class="no-bullet value-list  large-6 medium-6 small-6 columns">
			<li><span class="value-key thin">Waist</span>  30.31 <small>in</small></li>
			<li><span class="value-key thin">Hip</span>    37.4 <small>in</small></li>
			<li><span class="value-key thin">Length</span> 23.62 <small>in</small></li>
			<li><span class="value-key thin">Sleeve</span> 24.8 <small>in</small></li>
			<li><span class="value-key thin">Biceps</span> 13.78 <small>in</small></li>
		</ul>
		<div class="small-12 medium-12 large-12 columns">
			<p>Model wears a size 50 with the following adjustments:</p>
			<ul ng-if="metricUnits" class="no-bullet value-list left">
				<li><span class="value-key thin">Shoulders</span>– 2.5 <small>cm</small></li>
				<li><span class="value-key thin">Waist</span>– 2.5 <small>cm</small></li>
			</ul>
			<ul ng-if="!metricUnits" class="no-bullet value-list left">
				<li><span class="value-key thin">Shoulders</span>– 0.98 <small>in</small></li>
				<li><span class="value-key thin">Waist</span>– 0.98 <small>in</small></li>
			</ul>
			<button ng-click="metricUnits = !metricUnits" class="right button tiny radius">cm / in</button>
			<a ng-show="measurementsVisible" class="right" ng-click="measurementsVisible = !measurementsVisible">Hide measurements</a>
		</div>
	</section>

	<section class="small-12 medium-12 large-12 columns">
		<h2 class="thin">Places to Put Stuff</h2>
		<a href="/images/photos/outside-pocket.jpg"><img class="sidekick-image" src="/images/photos/pocket-inside.jpg" alt=""></a>
		<p class="image-caption">Zippered interior chest pocket on right side</p>
		<a href="/images/photos/inside-pocket.jpg"><img class="sidekick-image" src="/images/photos/inside-pocket.jpg" alt=""></a>
		<p class="image-caption">Welted interior pocket on left side, parallel to zipper</p>
		<a href="/images/photos/lining-tencel.jpg"><img class="sidekick-image" src="/images/photos/lining-black.jpg" alt=""></a>
		<p>All pockets are lined with a Tencel twill, a very strong yet soft fabric that prevents bacteria growth. Tencel yarn production is extremely ecological and the fabric is fully biodegradable.</p>
	</section>

	<section class="small-12 medium-12 large-12 columns">
		<h2 class="thin">Mastering the Art of Leather Tanning</h2>
		<a href="/images/photos/leather-black.jpg"><img class="sidekick-image" src="/images/photos/leather-black.jpg" alt=""></a>
		<p>Our tannery produces incredibly supple, chrome-free lambskin, with a beautiful warm touch and a gentle, pleasant smell. The profound color is perfectly even and the grain naturally flawless. The relatively high thickness (~3 ounces / 1.0–1.2 mm) gives the jacket a substantial weight and solid structure, without it becoming too heavy.</p>
		<p>The jacket will break in and develop a patina quickly.</p>
		<p>All our leather is full-grain, vegetable tanned, with a semi-aniline finish. We explain why that’s the most precious leather <here>.</here></p>
		<p><em>Further detailed information on leather types will be inserted here. (Maybe with an “accordion”?)</em></p>
	</section>

	<section class="small-12 medium-12 large-12 columns">
		<h2 class="thin">Breathable and Smooth</h2>
		<a href="/images/photos/jacket-lining.jpg"><img class="sidekick-image" src="/images/photos/lining-red.jpg" alt=""></a>
		<p>We chose a 100% Bemberg Cupro Twill for our lining for the same reasons that has made the fabric the top choice of bespoke suit makers. No other fabric breathes as well, absorbs and releases sweat as quickly, and is at the same time as smooth as Bemberg Cupro. </p>
		<p>You don’t feel clammy in the jacket, you can take it on and off easily, plus the fabric doesn’t build any static. It’s also more robust than other traditional lining fabrics like viscose (rayon) and acetate.</p>
	</section>


	<section class="small-12 medium-12 large-12 columns">
		<h2 class="thin">Polished Blue Collar Workers</h2>
		<a href="/images/photos/zipper.jpg"><img class="sidekick-image" src="/images/photos/zipper.jpg" alt=""></a>
		<p>All zippers are YKK Excella, where each tooth is individually polished, which results in a brilliance and prevents scratching of the jacket or your skin. YKK Excella zippers receive a beautiful, highly scratch-resisting coating and don’t contain Nickel. At the same time, the reliability of YKK Excella Zippers is legendary.</p>
		<br>
		<a href="/images/photos/buttons.jpg"><img class="sidekick-image" src="/images/photos/button.jpg" alt=""></a>
		<p>The buttons on our jackets are spring-type snaps from YKK, made purely out of nickel-free metal. They receive the same beautiful coatings as our zippers and provide reliable closure without the risk of damaging the leather when you want to open them.</p>
		<a href="{!! route('jackets.look', $jacket->model) !!}" class="button black expand call-to-action hollow">
			Customize Yours Now <span class="chevron chevron--right"></span>
		</a>
		<br>
	</section>
@stop

@section('footer')
	<div class="alert-box info" data-alert>
	  <h3><strong><small>Page Description</small></strong></h3>
		<h4>
			<small>
				Enable a close look at the jacket and all the important features/options.
			</small>
		</h4>

		<h3><strong><small>Purpose Served</small></strong></h3>
		<h4>
			<small>
				- Visualize the jacket <br>
				- Answer every important question about the jacket <br>
				- Convince the audience of the exclusive qualities of the jacket
			</small>
		</h4>

		<h3><strong><small>Components</small></strong></h3>
		<h4>
			<small>
				- Main heading <br>
				- Summary paragraph (lede) <br>
				- Subheadings <br>
				- Body copy <br>
				- Text on top of images to highlight certain things
			</small>
		</h4>
		<a href="#" class="close">&times;</a>
	</div>
@stop



