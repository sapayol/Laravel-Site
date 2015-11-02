@include('partials.global._head')
@include('partials.global.primary-nav')
@include('partials.global.header')

<main class="row measurement-entry" ng-controller="measurementCtrl" ng-init="init('{{{ $step }}}', '{{{ $order->bodyMeasurements->units }}}' {{{ $order->bodyMeasurements->$step ? ',' . $order->bodyMeasurements->$step : '' }}} )">
	<section class="large-4 large-push-8 medium-10 medium-centered large-uncentered small-12 columns">
		<div class="row collapse">
			<section class="small-12 small-pull-12 medium-12 small-12 columns">
				@include('partials.measurement.tracker')
			</section>
			<section class="small-12 small-push-12 medium-12 small-12 columns">
				@include('partials.measurement.form')
			</section>
		</div>
	</section>
	<div class="clearfix hide-for-large-up"></div>
	<section class="large-8 large-pull-4 medium-7 medium-centered large-uncentered small-12 columns">
		@if ($step != 'height')
			@include('partials.measurement.guide')
		@endif
	</section>
</main>

@include('partials.global.footer')
@include('partials.global._foot')
