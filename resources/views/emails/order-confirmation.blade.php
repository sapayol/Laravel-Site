@extends('layouts/email')

@section('title')
	Thanks for ordering a custom {{{ $order->jacket->name }}}
@stop

@section('main')

	<p>
		Hi {{{ $order->user->name }}}, <br>
		We’re very excited that you’ve decided to order a custom tailored {{{ $order->jacket->name }}} from us.
		Within the next 24 hours we will reach out to you to go over your measurements and discuss your fit preferences before we start tailoring it.
	</p>

	<ul>
		<li>Order Number: {{{ $order->id }}} </li>
		<li>Shipping Address: {{{ $order->address_id }}} </li>
		<li>Payment Info:  </li>
		<li>Model: {{{ $order->jacket->name }}} </li>
		<li>Look: </li>
		<li>Fit: </li>
	</ul>

	<p><a href="https://sapayol.com/our-leather" title="">Learn more about what makes the leather we use to make your jacket so special</a></p>

	<p>We will soon offer a flight jacket and a moto. Sign up here if you would like to be one of the first to know about them.</p>

	@if ($uncompleted_measurements = $order->userMeasurements->uncompleted()))
		<p>Looks like we still need the following measurements from you:</p>
		<ul class="text-left">
			@foreach ($uncompleted_measurements as $uncomplete_measurement)
				<li>{{{  ucwords(str_replace('_', ' ', $uncomplete_measurement)) }}}</li>
			@endforeach
		</ul>
		<p>We cannot begin tailoring your jacket until we receive all of your measurements.</p>
		<a href="/orders/{{{ $order->id}}}/fit/{{{ array_shift($uncompleted_measurements) }}}" class="button hollow">Add Missing Measurements</a>
	@endif
@stop