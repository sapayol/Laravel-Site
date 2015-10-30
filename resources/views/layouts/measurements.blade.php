@include('partials.global._head')
@include('partials.global.primary-nav')
@include('partials.global.header')

<main class="row measurement-entry" ng-controller="measurementCtrl" ng-init="init('{{{ $step }}}', '{{{ $order->bodyMeasurements->units }}}' {{{ $order->bodyMeasurements->$step ? ',' . $order->bodyMeasurements->$step : '' }}} )">
	<section class="large-8 large-push-4 medium-10 medium-centered large-uncentered small-12 columns">
		@if ($step != 'height')
			@include('partials.measurement.guide')
		@endif
		@include('partials.measurement.form')
	</section>
	<div class="clearfix hide-for-large-up"></div>
	<section class="large-4 large-pull-8 medium-7 medium-centered large-uncentered small-12 columns">
		@include('partials.measurement.tracker')
	</section>
</main>

@include('partials.global.footer')
@include('partials.global._foot')
