@include('partials.global._head')
@include('partials.global.primary-nav')
@include('partials.global.header')

<main class="row measurement-entry" ng-controller="measurementCtrl" ng-init="init('{{{ $step }}}', '{{{ $order->userMeasurements->units }}}' {{{ $order->userMeasurements->$step ? ',' . $order->userMeasurements->$step : '' }}} )">
	@if ($step != 'height')
		@include('partials.measurement.guide')
	@endif
	@include('partials.measurement.form')
	@include('partials.measurement.tracker')
</main>

@include('partials.global.footer')
@include('partials.global._foot')
