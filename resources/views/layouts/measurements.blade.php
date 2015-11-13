@include('partials.global._head')
@include('partials.global.primary-nav')

<header class="row">
	<h1 class="with-breadcrumbs">
			<a href="/orders/{{{ $order->id }}}" class="underlined">Your Order</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			@if ($order && $order->statusIsAfter('started'))
				Look
			@else
				<a href="/orders/{{{ $order->id }}}/look" class="underlined">Look</a>
			@endif
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			Fit
			<span class="chevron chevron--right breadcrumb-chevron"></span>
		  {{{ str_replace('_', ' ', $step) }}}
	</h1>
</header>

@include('partials.global.messages')

<main class="row measurement-entry" ng-controller="measurementCtrl" ng-init="init('{{{ $step }}}', '{{{ $order->bodyMeasurements->units }}}' {{{ $order->bodyMeasurements->$step ? ',' . $order->bodyMeasurements->$step : '' }}} )">
	<section class=" small-12 medium-5 large-8 medium-push-7  large-push-4 columns">
		@if ($step == 'height')
			<img src="/images/photos/other/height.jpg" alt="Height Diagram">
			<p><br>How tall are you?</p>
		@else
			@include('partials.measurement.guide')
		@endif
	</section>
	<section class="small-12 medium-7 large-4 medium-pull-5  large-pull-8 columns">
		<div class="row collapse reverse-with-flex">
			<section class="small-12 medium-12 large-12 columns">
				<br class="show-for-small">
				@include('partials.measurement.form')
				<br class="show-for-small">
			</section>
			<section class="small-12 medium-12 large-12 columns">
				@include('partials.measurement.tracker')
			</section>
		</div>
	</section>
</main>

@include('partials.global.footer')
@include('partials.global._foot')
