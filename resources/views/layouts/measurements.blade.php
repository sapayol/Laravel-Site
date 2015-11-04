@include('partials.global._head')
@include('partials.global.primary-nav')
@include('partials.global.header')

<main class="row measurement-entry" ng-controller="measurementCtrl" ng-init="init('{{{ $step }}}', '{{{ $order->bodyMeasurements->units }}}' {{{ $order->bodyMeasurements->$step ? ',' . $order->bodyMeasurements->$step : '' }}} )">
	<section class=" small-12 medium-5 large-8 medium-push-7  large-push-4 columns">
		@if ($step == 'height')
			<img src="/images/photos/other/height.jpg" alt="">
			<p><br>How tall are you?</p>
		@else
			@include('partials.measurement.guide')
		@endif
	</section>
	<section class="small-12 medium-7 large-4 medium-pull-5  large-pull-8 columns">
		<div class="row collapse reverse-with-flex">
			<section class="small-12 medium-12 large-12 columns">
				@include('partials.measurement.form')
			</section>
			<section class="small-12 medium-12 large-12 columns">
				@include('partials.measurement.tracker')
			</section>
		</div>
	</section>
	<div class="clearfix hide-for-large-up"></div>
</main>

@include('partials.global.footer')
@include('partials.global._foot')
