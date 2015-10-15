@extends('layouts/default')

@section('main')
	<p class="large-12 medium-12 small-12 columns">Would you like to use the measurements from your last placed order? <br><br></p>
	<div class="large-6 medium-8 large-uncentered medium-centered small-12 columns order-summary">
		<img class="customization-image" src="/images/photos/jackets/{{{ $last_order->jacket->model }}}/hardware-{{{ $last_order->hardware_color()->name }}}.jpg">
	</div>
	<div class="large-6 medium-6 small-12 columns">
		<h6>Order Details</h6>
		<ul class="no-bullet value-list">
			<li><small class="list-key">Date Started </small>  {{{ date('M d, Y', strtotime($last_order->created_at)) }}} </li>
			<li><small class="list-key">Jacket Name  </small>  {{{ $last_order->jacket->name }}} </li>
			@foreach ($last_order->attributes as $attribute)
				<li><small class="list-key">{{{ ucwords(str_replace('_', ' ', $attribute->type)) }}}</small> {{{ ucwords($attribute->name) }}} </li>
			@endforeach
		</ul>
	</div>
	@if ($last_order->userMeasurements->completed())
		<section class="large-6 medium-6 small-12 columns">
				<h6>Completed Measurements</h6>
				<ul class="no-bullet value-list">
					@foreach ($last_order->userMeasurements->completed() as $measurement)
						@if ($measurement == 'note')
							<li><br></li>
						@endif
						@if ($last_order->userMeasurements->$measurement)
								<li>
									<small class="list-key">{{{ ucwords(str_replace('_', ' ', $measurement)) }}}</small>
										<span class="list-value">
											@if ($last_order->userMeasurements->units == 'in')
												<strong decimal-to-fraction="{{{ $last_order->userMeasurements->$measurement }}}">{{{ $last_order->userMeasurements->$measurement }}}</strong> "
											@else
												<strong>{{{ $last_order->userMeasurements->$measurement != round($last_order->userMeasurements->$measurement) ?  round($last_order->userMeasurements->$measurement, 1) : round($last_order->userMeasurements->$measurement) }}}</strong> cm
										@endif
									</span>
							</li>
						@endif
				@endforeach
			</ul>
		</section>
	@endif

	<section class="large-6 medium-8 small-12 large-centered medium-centered columns">
		<form action="/orders/{{{ $last_order->id }}}/fit" method="POST">
			<input type="hidden" name="_token"         value="{!! csrf_token() !!}">
			<input type="submit" class="button expand" value="Use These Measurements">
		</form>
		<div class="text-center">or</div>
		<br>
		<form action="/orders/{{{ $last_order->id }}}/reset" method="POST">
			<input type="hidden" name="_token"                      value="{{{ csrf_token() }}}">
			<input type="hidden" name="_method"                     value="PATCH">
			<input type="hidden" name="user_id"                     value="{{{ $new_order['user_id'] }}}">
			<input type="hidden" name="model"                       value="{{{ $new_order['model'] }}}">
			<input type="hidden" name="jacket_look[leather_type]"   value="{{{ $new_order['jacket_look']['leather_type'] }}}">
			<input type="hidden" name="jacket_look[leather_color]"  value="{{{ $new_order['jacket_look']['leather_color'] }}}">
			<input type="hidden" name="jacket_look[lining_color]"   value="{{{ $new_order['jacket_look']['lining_color'] }}}">
			<input type="hidden" name="jacket_look[hardware_color]" value="{{{ $new_order['jacket_look']['hardware_color'] }}}">
			<input type="submit" class="button expand hollow"       value="Clear My Measurements">
			<label for="retain_measurements">
				<input type="checkbox" name="retain_measurements" id="retain_measurements" checked="true">
				Use the measurements from my last order
			</label>
		</form>
	</section>
@stop