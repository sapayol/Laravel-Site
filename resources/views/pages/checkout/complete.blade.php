@extends('layouts/default')

@section('title')
	{{{ $order->jacket->name }}}
@stop

@section('main')
<section class="large-6 medium-8 large-uncentered medium-centered small-12 columns order-summary ">
	<p>We’re very excited that you’ve decided to order a custom tailored BLEECKER from us.</p>
	<p>Within the next 24 hours we will reach out to you to go over your measurements and discuss your fit preferences before we start tailoring it.</p>
	<p>Let’s make sure we have the right contact details from you:</p>
	<ul class="no-bullet value-list">
		<li><small class="list-key">Name</small><strong>{{{ $order->user->name }}}</strong></li>
		<li><small class="list-key">Email</small><strong>{{{ $order->user->email }}}</strong></li>
		<li><small class="list-key">Address</small><strong>{{{ $order->address->address1 }}}</strong></li>
		@if ($order->address->address2 )
			<li><small class="list-key">&nbsp;</small><strong>{{{ $order->address->address2 }}}</strong></li>
		@endif
		<li><small class="list-key">&nbsp;</small><strong>{{{ $order->address->city }}}, {{{ $order->address->province }}} {{{ $order->address->postcode }}}</strong></li>
		<li><small class="list-key">&nbsp;</small><strong>{{{ $order->address->country }}}</strong></li>
	</ul>
	<p>If this information is wrong or you have questions, write us at <a class="underlined" href="mailto:contact@sapayol.com">contact@sapayol.com</a>.</p>
</section>
<h2 class="large-12 medium-8 small-12 columns order-summary">
	Order Details
</h2>
<ul class="large-12 medium-8 small-12 columns order-summary no-bullet value-list">
	<li><small class="list-key">Order # </small><strong>{{{ $order->id  }}}	</strong></li>
	<li><small class="list-key">Date </small>{{{ date('M d, Y', strtotime($order->created_at))  }}}	</li>
</ul>
<div class="large-6 medium-8 large-uncentered medium-centered small-12 columns order-summary">
	<img class="customization-image" src="/images/photos/jackets/{{{ $order->jacket->model }}}/hardware-{{{ $order->hardware_color()->name }}}.jpg">
</div>
<div class="large-6 medium-8 small-12 columns order-summary">
	<h3 class="thin">Look</h3>
	<ul class="no-bullet value-list">
		<li><small class="list-key">Model </small>{{{ $order->jacket->name  }}}	</li>
		<li><small class="list-key">Leather Type </small>{{{ ucfirst($order->leather_type()->name)  }}}	</li>
		<li><small class="list-key">Leather Color </small>{{{ ucfirst($order->leather_color()->name) }}}	</li>
		<li><small class="list-key">Lining Color </small>{{{ ucfirst($order->lining_color()->name) }}}	</li>
		<li><small class="list-key">Hardware Color </small>{{{ ucfirst($order->hardware_color()->name) }}}	</li>
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
						@if ($measurement == 'note')
							<em>{{{ $order->userMeasurements->$measurement }}}</em>
						@elseif ($order->userMeasurements->units == 'in')
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
				@foreach ($incomplete_measurements as $incomplete_measurement)
					<li>{{{  ucwords(str_replace('_', ' ', $incomplete_measurement)) }}}</li>
				@endforeach
			</ul>
			<a href="/orders/{{{ $order->id}}}/fit/{{{ array_shift($incomplete_measurements) }}}" class="button hollow">Add Missing Measurements</a>
		</div>
	@endif
</div>

<div class="large-6 large-offset-2 medium-8 small-12 columns order-summary">
	<h3 class="thin">Payment Info</h3>
	<ul class="no-bullet value-list">
		<li><small class="list-key">Method</small><strong>Credit</strong></li>
		<li><small class="list-key">Total </small><strong>${{{ $order->jacket->price }}}	</strong></li>
	</ul>

	@if (count($incomplete_measurements = $order->userMeasurements->getIncompleteMeasurements()) <= 0)
		<a href="/jackets" class="button">Check out our other jackets</a>
	@endif
</div>

<div class="clearfix"></div>

<div class="large-6 medium-8 medium-centered small-12 columns order-summary text-center">

</div>


@stop



