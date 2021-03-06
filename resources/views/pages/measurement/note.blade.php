@extends('layouts/default')

@section('title')
Fit | Note
@stop

@section('header')
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
		  Note
	</h1>
@stop


@section('main')
	<section class=" small-12 medium-5 large-8 medium-push-7 large-push-4 columns note-entry">
		<form action="/orders/{{{ $order->id}}}/fit" method="POST">
			<p>Please let us know if you have any additional information you want us to know about your measurements.</p>

			<label for="note" class="text-input-label">
				<span class="label-title">Note</span>
				<textarea name="measurements[note]" id="note" rows=6 autofocus>{{{ $order->bodyMeasurements->note }}}</textarea>
				<span class="input-units">@{{ units }}</span>
			</label>

		  <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
				<div class="text-center">
				<button type="submit" class="black button expand">Submit Note</button>
				<br class="hide-for-small-only">
				@if ($order->status == 'started')
					<a href="/orders/{{{ $order->id }}}/checkout" class="under-button-link underlined">Skip this step</a>
				@endif
			</div>
		</form>
	</section>
	<section class="small-12 medium-7 large-4 medium-pull-5 large-pull-8 columns">
		@include('partials.measurement.tracker')
	</section>
@stop
