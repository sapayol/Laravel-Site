@extends('layouts/default')

@section('title')
	{{{ $order->jacket->name }}}
@stop

@section('main')
<section class="large-6 medium-8 large-uncentered medium-centered small-12 columns order-summary ">
	<p>We’re very excited that you’ve decided to order a custom tailored BLEECKER from us.</p>
	<p>Within the next 24 hours we will reach out to you to go over your measurements and discuss your fit preferences before we start tailoring it.</p>
	<p>Let’s make sure we have the right contact details from you:</p>
	If this information is wrong or you have questions, write us at contact@sapayol.com.
</section>
<div class="large-6 medium-8 large-uncentered medium-centered small-12 columns order-summary">
	<img class="customization-image" src="/images/photos/jackets/{{{ $order->jacket->model }}}/hardware-{{{ $order->hardware_color()->name }}}.jpg">
</div>
<h2 class="large-12 medium-8 small-12 columns order-summary">Order Details</h2>
<div class="large-6 medium-8 small-12 columns order-summary">
	<h3 class="thin">Look</h3>
	<ul class="no-bullet value-list">
		<li><small class="list-key">Order # </small><strong>{{{ $order->id  }}}	</strong></li>
		<li><small class="list-key">Model </small>{{{ $order->jacket->name  }}}	</li>
		<li><small class="list-key">Leather Type </small>{{{ ucfirst($order->leather_type()->name)  }}}	</li>
		<li><small class="list-key">Leather Color </small>{{{ ucfirst($order->leather_color()->name) }}}	</li>
		<li><small class="list-key">Lining Color </small>{{{ ucfirst($order->lining_color()->name) }}}	</li>
		<li><small class="list-key">Hardware Color </small>{{{ ucfirst($order->hardware_color()->name) }}}	</li>
	</ul>
</div>
<div class="large-6 medium-8 small-12 columns order-summary">
	<h3 class="thin">Shipping Info</h3>
	<ul class="no-bullet value-list">
		<li><small class="list-key">Name</small>{{{ $order->user->name }}}</li>
		<li><small class="list-key">Email</small>{{{ $order->user->email }}}</li>
		<li><small class="list-key">Address 1</small>{{{ $order->address->address1 }}}</li>
		<li><small class="list-key">Address 2</small>{{{ $order->address->address2 }}}</li>
		<li><small class="list-key">City</small>{{{ $order->address->city }}}</li>
		<li><small class="list-key">Zip / Post Code</small>{{{ $order->address->postcode }}}</li>
		<li><small class="list-key">State / Province</small>{{{ $order->address->province }}}</li>
		<li><small class="list-key">Country</small>{{{ $order->address->country }}}</li>
	</ul>
</div>
<div class="clearfix"></div>
<div class="large-4 medium-8 small-12 columns order-summary">
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
	@if (count($incomplete_measurements = $order->userMeasurements->getIncompleteMeasurements()) > 0)
		<div class="panel callout">
			<p>Looks like we still need the following measurements from you:</p>
			<ul class="text-left">
				@foreach ($order->userMeasurements->getIncompleteMeasurements() as $incomplete_measurement)
					<li>{{{  ucwords(str_replace('_', ' ', $incomplete_measurement)) }}}</li>
				@endforeach
			</ul>
			<button class="button hollow">Add Missing Measurements</button>
		</div>
	@else
		<a href="" class="button">Check out our other jackets</a>
	@endif
</div>

<div class="large-6 large-offset-2 medium-8 small-12 columns order-summary">
	<h3 class="thin">Payment Info</h3>
	<ul class="no-bullet value-list">
		<li><small class="list-key">Method</small><strong>Credit</strong></li>
		<li><small class="list-key">Total </small><strong>${{{ $order->jacket->price }}}	</strong></li>
	</ul>
</div>

<div class="clearfix"></div>

<div class="large-6 medium-8 medium-centered small-12 columns order-summary text-center">

</div>


@stop



