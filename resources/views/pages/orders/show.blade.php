@extends('layouts/default')

@section('main')
	<p class="large-12 medium-12 small-12 columns">We have almost everything we need to create your {{{ $order->jacket->name }}} <br><br></p>
	<div class="large-6 medium-8 large-uncentered medium-centered small-12 columns order-summary">
		<img class="customization-image" src="/images/photos/jackets/{{{ $order->jacket->model }}}/hardware-{{{ $order->hardware_color()->name }}}.jpg">
	</div>
	<div class="large-6 medium-6 small-12 columns">
		<h6>Order Details</h6>
		<ul class="no-bullet value-list">
			<li><small class="list-key">Date Started </small>  {{{ date('M d, Y', strtotime($order->created_at)) }}} </li>
			<li><small class="list-key">Jacket Name  </small>  {{{ $order->jacket->name }}} </li>
			@foreach ($order->attributes as $attribute)
				<li><small class="list-key">{{{ ucwords(str_replace('_', ' ', $attribute->type)) }}}</small> {{{ ucwords($attribute->name) }}} </li>
			@endforeach
		</ul>
	</div>
	@if (count($order->userMeasurements->getCompleteMeasurements()) > 0)
		<section class="large-6 medium-6 small-12 columns">
				<h6>Completed Measurements</h6>
				<ul class="no-bullet value-list">
					@foreach ($order->userMeasurements->getCompleteMeasurements() as $measurement)
						@if ($measurement == 'note')
							<li><br></li>
						@endif
						@if ($order->userMeasurements->$measurement)
								<li>
									<small class="list-key">{{{ ucwords(str_replace('_', ' ', $measurement)) }}}</small>
										<span class="list-value">
											@if ($measurement == 'note')
												<em>{{{ $order->userMeasurements->$measurement }}}</em>
											@elseif ($order->userMeasurements->units == 'in')
												<strong decimal-to-fraction="{{{ $order->userMeasurements->$measurement }}}">{{{ $order->userMeasurements->$measurement }}}</strong> "
											@else
												<strong>{{{ $order->userMeasurements->$measurement != round($order->userMeasurements->$measurement) ?  round($order->userMeasurements->$measurement, 1) : round($order->userMeasurements->$measurement) }}}</strong> cm
										@endif
									</span>
							</li>
						@endif
				@endforeach
			</ul>
		</section>
	@endif

	<section class="large-6 medium-8 small-12 large-centered medium-centered columns">
		<form action="/orders/{{{ $order->id }}}/fit" method="POST">
			<input type="hidden" name="_token"         value="{!! csrf_token() !!}">
			<input type="submit" class="button expand" value="Finish My Order">
		</form>
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