@extends('layouts/default')

@section('title')
	{{{ $order->jacket->name }}}
@stop

@section('main')
<div class="large-4 medium-4 small-12 columns order-summary">
	<img class="customization-image" src="/images/photos/jackets/{{{ $order->jacket->model }}}/hardware-{{{ $order->hardware_color()->name }}}.jpg">
	<h2>Your Bleecker</h2>
	<h3 class="thin">Look</h3>
	<ul class="no-bullet value-list">
		<li><small class="list-key">Leather Type </small><strong>{{{ ucfirst($order->leather_type()->name)  }}}	</strong></li>
		<li><small class="list-key">Leather Color </small><strong>{{{ ucfirst($order->leather_color()->name) }}}	</strong></li>
		<li><small class="list-key">Lining Color </small><strong>{{{ ucfirst($order->lining_color()->name) }}}	</strong></li>
		<li><small class="list-key">Hardware Color </small><strong>{{{ ucfirst($order->hardware_color()->name) }}}	</strong></li>
	</ul>

	<h3 class="thin">Fit</h3>
	<ul class="no-bullet value-list">
		<?php $measurements = ['height', 'half_shoulder', 'back_width', 'chest', 'stomach', 'back_length', 'waist', 'arm', 'biceps', 'note'];  ?>
		@foreach ($measurements as $measurement)
			@if ($measurement == 'note')
				<li><br></li>
			@endif
			<li>
				@if ($order->userMeasurements->$measurement)
					<small class="list-key">{{{ ucwords(str_replace('_', ' ', $measurement)) }}}</small>
					<span class="list-value">
						@if ($order->userMeasurements->units == 'in')
							<strong decimal-to-fraction="{{{ $order->userMeasurements->$measurement }}}">{{{ $order->userMeasurements->$measurement }}}</strong> "
						@else
							<strong>{{{ $order->userMeasurements->$measurement != round($order->userMeasurements->$measurement) ?  round($order->userMeasurements->$measurement, 1) : round($order->userMeasurements->$measurement) }}}</strong> cm
						@endif
					</span>
				@endif
			</li>
		@endforeach
	</ul>

	<h3 class="thin">Shipping Info</h3>
	<ul class="no-bullet value-list">
		<li><small class="list-key">Name</small><strong>{{{ $order->user->name }}}</strong></li>
		<li><small class="list-key">Email</small><strong>{{{ $order->user->email }}}</strong></li>
		<li><small class="list-key">Address 1</small><strong>{{{ $order->address->address1 }}}</strong></li>
		<li><small class="list-key">Address 2</small><strong>{{{ $order->address->address2 }}}</strong></li>
		<li><small class="list-key">City</small><strong>{{{ $order->address->city }}}</strong></li>
		<li><small class="list-key">Zip / Post Code</small><strong>{{{ $order->address->postcode }}}</strong></li>
		<li><small class="list-key">State / Province</small><strong>{{{ $order->address->province }}}</strong></li>
		<li><small class="list-key">Country</small><strong>{{{ $order->address->country }}}</strong></li>
	</ul>

	<h3 class="thin">Payment Info</h3>
	<ul class="no-bullet value-list">
		<li><small class="list-key">Method</small><strong>Credit</strong></li>
		<li><small class="list-key">Total </small><strong>${{{ $order->jacket->price }}}	</strong></li>
	</ul>

	@if (count($incomplete_measurements = $order->userMeasurements->getIncompleteMeasurements()) > 0)
		<div class="panel callout">
			<p>Looks like we still need the following measurements from you:</p>
			<ul>
				@foreach ($order->userMeasurements->getIncompleteMeasurements() as $incomplete_measurement)
					<li>{{{  ucwords(str_replace('_', ' ', $incomplete_measurement)) }}}</li>
				@endforeach
			</ul>
			<button class="button hollow">Add Missing Measurements</button>
		</div>
	@endif

</div>


@stop



