<?php $action = Request::route()->getAction()['as'] ?>

@include('00-atoms.meta._head')

@include('01-molecules.navigation.primary-nav')

	@include('02-organisms.global.header')

	@yield('full-width-hero')

	<main class="row">
		<section class="small-12 medium-12 large-12 columns carousel-container">
			<div class="jacket-carousel">
				@yield('carousel_images')
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
			<div class="player">
			  <video poster="/images/video-posters/jackets/{{{ $jacket->model }}}.png" controls crossorigin>
			    <source src="/videos/jackets/{{{ $jacket->model }}}.webm" type="video/webm">
			    <source src="/videos/jackets/{{{ $jacket->model }}}.mp4"  type="video/mp4">
			    <a href="/videos/jackets/{{{ $jacket->model }}}.mp4">Download</a>
			  </video>
			</div>
			<br>
			<a class="video-caption underlined" ng-show="!measurementsVisible" ng-click="measurementsVisible = !measurementsVisible">Measurements Seen In the Video </a>
		</section>

		<section ng-show="measurementsVisible">
			@yield('measurement_data')
			@foreach ($video_measurements as $column)
				<ul ng-if="metricUnits" class="no-bullet value-list tight-list large-6 medium-6 small-6 columns">
					@foreach ($column as $key => $value)
						<li><small class="list-key">{{{ ucwords(str_replace('_', ' ', $key)) }}}</small> {{{ $value }}} <small>cm</small></li>
					@endforeach
				</ul>
			@endforeach
			@foreach ($video_measurements as $column)
				<ul ng-if="!metricUnits" class="no-bullet value-list tight-list large-6 medium-6 small-6 columns">
					@foreach ($column as $key => $value)
						<li><small class="list-key">{{{ ucwords(str_replace('_', ' ', $key)) }}}</small> {{{ round($value  / 2.54, 1) }}} <small>in</small></li>
					@endforeach
				</ul>
			@endforeach
			<div class="small-12 medium-12 large-12 columns">
				<p>Model wears a size {{{ $model_size }}} with the following adjustments:</p>
				<ul ng-if="metricUnits" class="no-bullet value-list tight-list left">
					@foreach ($video_adjustments as $key => $value)
						<li><small class="list-key">{{{ ucwords(str_replace('_', ' ', $key)) }}}</small> {{{ $value }}} <small>cm</small></li>
					@endforeach
				</ul>
				<ul ng-if="!metricUnits" class="no-bullet value-list tight-list left">
					@foreach ($video_adjustments as $key => $value)
						<li><small class="list-key">{{{ ucwords(str_replace('_', ' ', $key)) }}}</small> {{{ round($value / 2.54, 1) }}} <small>in</small></li>
					@endforeach
				</ul>
				<button ng-click="metricUnits = !metricUnits" class="right button tiny radius">cm / in</button>
				<a ng-show="measurementsVisible" class="right" ng-click="measurementsVisible = !measurementsVisible">Hide measurements</a>
			</div>
		</section>

		@yield('main')

		<section class="small-12 medium-12 large-12 columns">
			<h2 class="thin">Vegetable tanned, chrome-free, full-grain leather</h2>
			<a href="/images/photos/leather/lamb_c_black_close-up.jpg"><img class="sidekick-image" src="/images/photos/leather/lamb_c_black_close-up.jpg" alt=""></a>
			<p>All our jackets are made with the most exclusive, vegetable tanned, full-grain leather. It’s supple, thick, has a warm touch, and a pleasant smell. With good care, it will not crack or bulge for decades but break in and develop a beautiful patina.</p>
			<p>Our leather is also absolutely free of the chromium salts that can become carcinogenic, found in almost every other leather garment.</p>
			<p><em>Leather is the end result of a process with various stages and the qualities of it are influenced by every step along the way:</em></p>
			<a href="/our-leather?jacket={{{ $jacket->model }}}" class="underlined" title="">Learn more about what makes our leather so special</a>
		</section>

		<section class="small-12 medium-12 large-12 columns">
			<h2 class="thin">Breathable and Smooth</h2>
			<a href="/images/photos/linings/bemberg_twill_bordeaux_close-up.jpg"><img class="sidekick-image" src="/images/photos/linings/bemberg_twill_bordeaux_close-up.jpg" alt=""></a>
			<p>We chose a 100% Bemberg Cupro Twill for our lining for the same reasons that has made the fabric the top choice of bespoke suit makers. No other fabric breathes as well, absorbs and releases sweat as quickly, and is at the same time as smooth as Bemberg Cupro. </p>
			<p>You don’t feel clammy in the jacket, you can take it on and off easily, plus the fabric doesn’t build any static. It’s also more robust than other traditional lining fabrics like viscose (rayon) and acetate.</p>
		</section>

		<section class="small-12 medium-12 large-12 columns">
			<h2 class="thin">Polished Blue Collar Workers</h2>
			<a href="/images/photos/hardware/zipper_silver_detail.jpg"><img class="sidekick-image" src="/images/photos/hardware/zipper_silver_detail.jpg" alt=""></a>
			<p>All zippers are YKK Excella, where each tooth is individually polished, which results in a brilliance and prevents scratching of the jacket or your skin. YKK Excella zippers receive a beautiful, highly scratch-resisting coating and don’t contain Nickel. At the same time, the reliability of YKK Excella Zippers is legendary.</p>
			<br>
			<a href="/images/photos/hardware/snap_silver_detail.jpg"><img class="sidekick-image" src="/images/photos/hardware/snap_silver_detail.jpg" alt=""></a>
			<p>The buttons on our jackets are spring-type snaps from YKK, made purely out of nickel-free metal. They receive the same beautiful coatings as our zippers and provide reliable closure without the risk of damaging the leather when you want to open them.</p>
			<a href="{!! route('jackets.look', $jacket->model) !!}" class="button black expand call-to-action hollow">
				Customize Yours Now <span class="chevron chevron--right"></span>
			</a>
			<br>
		</section>
	</main>

	@yield('footer')

@include('00-atoms.meta._foot')
