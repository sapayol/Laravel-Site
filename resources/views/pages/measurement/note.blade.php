@extends('layouts/default')

@section('page_wrap_class')
  four-levels
@stop

@section('title')
	Fit | Units
@stop

@section('main')
	<section class="large-12 medium-12 small-12 columns">
		<form action="/orders/{{{ $order->id}}}/fit" method="POST">
			<p>Please let us know if you have any additional information you want us to know about your measurements.</p>

			<label for="note" class="text-input-label">
				<span class="label-title">Note</span>
				<textarea name="measurements[note]" id="note" rows=6>{{{ $order->bodyMeasurements->note }}}</textarea>
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
		@include('partials.measurement.tracker')
	</section>
@stop
