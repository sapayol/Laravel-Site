@extends('layouts/wide-single-column')

@section('title')
Your Order
@stop

@section("page_wrap_class")
	show-order-page
@stop

@section('header')
  Your Order
@stop

@section('main')

	<div class="text-center">
		<br><br>
		<p>We have almost everything we need to create your {{{ $order->jacket->name }}}</p>
	</div>

	@if ($order->bodyMeasurements->completed())
		<section class="large-12 medium-10 small-9 small-centered columns">
			<h6>Completed Measurements</h6>
			<ul class="no-bullet value-list">
				@foreach ($order->bodyMeasurements->completed() as $measurement)
					@if ($measurement == 'note')
						<li><br></li>
					@endif
					@if ($order->bodyMeasurements->$measurement)
						<li>
							<small class="list-key">{{{ ucwords(str_replace('_', ' ', $measurement)) }}}</small>
								<span class="list-value">
									@if ($measurement == 'note')
										<em>{{{ $order->bodyMeasurements->$measurement }}}</em>
									@elseif ($order->bodyMeasurements->units == 'in')
										<strong decimal-to-fraction="{{{ $order->bodyMeasurements->$measurement }}}">{{{ $order->bodyMeasurements->$measurement }}}</strong> "
									@else
										<strong>{{{ $order->bodyMeasurements->$measurement != round($order->bodyMeasurements->$measurement) ?  round($order->bodyMeasurements->$measurement, 1) : round($order->bodyMeasurements->$measurement) }}}</strong> cm
								@endif
							</span>
						</li>
					@endif
				@endforeach
			</ul>
		</section>
	@endif

	<div class="clearfix"></div>

	<hr class="thin full-width">

	@include('partials.jacket.look')



	<section class="large-8 medium-7 medium-centered columns">
		<a href="/orders/{{{ $order->id }}}/fit/next" class="button expand">Finish Your Order</a>
		<div class="text-center">or</div>
		<br>
		<form action="/orders/{{{ $order->id }}}/reset" method="POST">
			<input type="hidden" name="_token"                      value="{{{ csrf_token() }}}">
			<input type="hidden" name="_method"                     value="PATCH">
			<input type="hidden" name="user_id"                     value="{{{ $new_order['user_id'] }}}">
			<input type="hidden" name="model"                       value="{{{ $new_order['model'] }}}">
			<input type="hidden" name="jacket_look[leather_type]"   value="{{{ $new_order['jacket_look']['leather_type'] }}}">
			<input type="hidden" name="jacket_look[leather_color]"  value="{{{ $new_order['jacket_look']['leather_color'] }}}">
			<input type="hidden" name="jacket_look[lining_color]"   value="{{{ $new_order['jacket_look']['lining_color'] }}}">
			<input type="hidden" name="jacket_look[hardware_color]" value="{{{ $new_order['jacket_look']['hardware_color'] }}}">
			<input type="submit" class="button expand hollow"       value="Start a New Order">
			<label for="retain_measurements">
				<input type="checkbox" name="retain_measurements" id="retain_measurements" checked="true">
				Use the measurements from my last order
			</label>
		</form>
	</section>
@stop