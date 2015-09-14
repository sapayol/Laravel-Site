@include('partials.global._head')
@include('partials.global.primary-nav')
@include('partials.global.header')

<main class="row measurement-entry" ng-controller="measurementCtrl" ng-init="init('{{{ $step }}}', '{{{ $order->userMeasurements->units }}}' {{{ $order->userMeasurements->$step ? ',' . $order->userMeasurements->$step : '' }}} )">
	<div class="large-8 medium-10 small-12 columns">
		@if ($step != 'height')
			@include('partials.measurement.guide')
		@endif
		@include('partials.measurement.form')
	</div>
	<div class="large-4 medium-12 small-12 columns">
		@include('partials.measurement.tracker')
	</div>
</main>

@include('partials.global.footer')
@include('partials.global._foot')
