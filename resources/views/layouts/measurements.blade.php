@include('partials.global._head')
@include('partials.global.primary-nav')

<?php $min = config('measurements.' . $step . '.min.' . $order->bodyMeasurements->units); ?>
<?php $max = config('measurements.' . $step . '.max.' . $order->bodyMeasurements->units); ?>

<header class="row">
	<h1 class="with-breadcrumbs">
			<a href="/orders/{{{ $order->id }}}" class="underlined">Your Order</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			@if ($order && $order->statusIsAfter('started'))
				Look
			@else
				<a href="/orders/{{{ $order->id }}}" class="underlined">Look</a>
			@endif
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			Fit
			<span class="chevron chevron--right breadcrumb-chevron"></span>
		  {{{ str_replace('_', ' ', $step) }}}
	</h1>
</header>

@include('partials.global.messages')

<main class="row measurement-entry" ng-controller="measurementCtrl" ng-init="init('{{{ $step }}}', '{{{ $order->bodyMeasurements->units }}}' {{{ $order->bodyMeasurements->$step ? ',' . $order->bodyMeasurements->$step : '' }}} )">

	<section class="small-12 medium-12 large-12 columns">
		@if ($step == 'height')
			<img src="/images/photos/height.jpg" alt="Height Diagram">
		@else
			@include('partials.measurement.guide')
		@endif
	</section>

	<div class="clearfix"></div>

	<div class="medium-7 large-6 medium-centered columns measurement-instructions">
		@yield('instructions')
		@if ($step == 'height')
			<p>How tall are you?</p>
		@else
			<em>Usually between <strong>{{{ $min }}}</strong>  and <strong>{{{ $max }}}</strong> <small>{{{ $order->bodyMeasurements->units }}}</small></em>
		@endif
	</div>

	<div class="clearfix"></div>

	<section class="medium-7 large-6 medium-centered columns">
		<br class="show-for-small">
		@include('partials.measurement.form')
		<br class="show-for-small">
	</section>

	<section class="small-12 medium-7 large-6 medium-centered columns">
		@include('partials.measurement.tracker')
	</section>

</main>

@include('partials.global.footer')
@include('partials.global._foot')
