@extends('layouts/email')

@section('title')
	Thanks for ordering a custom {{{ $order->jacket->name }}}
@stop

@section('row1')
	<p>
		Hi {{{ $order->user->name }}}, <br><br>
		We’re very excited that you’ve decided to order a custom tailored {{{ $order->jacket->name }}} from us.
		Within the next 24 hours we will reach out to you to go over your measurements and discuss your fit preferences before we start tailoring it.
	</p>
@stop

@section('row2')
	<table>
		<tbody>
			<tr>
				<td width="250px">
					<h3>Order Info</h3>
					<br>
					<ul class="value-list">
						<li><small class="list-key">Order #</small><strong>{{{ $order->id }}}</strong></li>
						<li><small class="list-key">Name</small><strong>{{{ $order->user->name }}}</strong></li>
						<li><small class="list-key">Address</small><strong>{{{ $order->address->address1 }}}</strong></li>
						@if ($order->address->address2 )
							<li><small class="list-key">&nbsp;</small><strong>{{{ $order->address->address2 }}}</strong></li>
						@endif
						<li><small class="list-key">&nbsp;</small><strong>{{{ $order->address->city }}}, {{{ $order->address->province }}} {{{ $order->address->postcode }}}</strong></li>
						<li><small class="list-key">&nbsp;</small><strong>{{{ $order->address->country }}}</strong></li>
					</ul>
				</td>
				<td width="250px">
					<h3>Jacket Info</h3>
					<br>
					<ul class="value-list">
						<li><small class="list-key">Model</small><strong>{{{ ucfirst($order->jacket->name)  }}}	</strong></li>
						<li><small class="list-key">Leather Type </small><strong>{{{ ucfirst($order->leather_type()->name)  }}}	</strong></li>
						<li><small class="list-key">Leather Color </small><strong>{{{ ucfirst($order->leather_color()->name) }}}	</strong></li>
						<li><small class="list-key">Lining Color </small><strong>{{{ ucfirst($order->lining_color()->name) }}}	</strong></li>
						<li><small class="list-key">Hardware Color </small><strong>{{{ ucfirst($order->hardware_color()->name) }}}	</strong></li>
					</ul>
				</td>
			</tr>
			<tr>
				<td width="250px">
					<h3 class="thin left">Payment Info</h3>
					<br>
					<ul class="no-bullet value-list">
						<li>
							<small class="list-key">{{{ ucwords($order->jacket->model) }}}</small>
							<span class="list-value"><small>$ </small>&nbsp;{{{ $order->jacket->price }}}</span>
						</li>
						<li>
							<small class="list-key">Shipping</small>
							<span class="list-value"><small>$ </small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0.00</span>
						</li>
						<li>
							<small class="list-key">Taxes</small>
							<span class="list-value"><small>$ </small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0.00</span>
						</li>
						<li>
							<small class="list-key">Order Total</small>
							<span class="list-value"><small>$ </small>&nbsp;{{{ $order->total }}}</span>
						</li>
					</ul>

				</td>
				<td width="250px">
					<h3 class="thin left">Your Measurements</h3>
					<br>
					<ul class="value-list">
						<?php $measurements = ['height', 'half_shoulder', 'back_width', 'chest', 'stomach', 'back_length', 'waist', 'arm', 'biceps', 'note'];  ?>
						@foreach ($measurements as $measurement)
							@if ($order->bodymeasurements->$measurement)
								<li>
									<small class="list-key">{{{ ucwords(str_replace('_', ' ', $measurement)) }}}</small>
									<span class="list-value">
										@if ($order->bodyMeasurements->units == 'in')
											<strong decimal-to-fraction="{{{ $order->bodyMeasurements->$measurement }}}">{{{ $order->bodyMeasurements->$measurement }}}</strong> "
										@else
											<strong>{{{ $order->bodyMeasurements->$measurement != round($order->bodyMeasurements->$measurement) ?  round($order->bodyMeasurements->$measurement, 1) : round($order->bodyMeasurements->$measurement) }}}</strong> cm
										@endif
									</span>
								</li>
							@endif
						@endforeach
					</ul>
				</td>
			</tr>
		</tbody>
	</table>
@stop


@section('row3')
	@if ($uncompleted_measurements = $order->bodyMeasurements->uncompleted())
		<br>
		<p>We cannot begin tailoring your jacket until we receive all of your measurements.</p>
		<p>Looks like we still need the following measurements from you:</p>
		<ul class="text-left">
			@foreach ($uncompleted_measurements as $uncomplete_measurement)
				<li>{{{  ucwords(str_replace('_', ' ', $uncomplete_measurement)) }}}</li>
			@endforeach
		</ul>
		<br><br>
		<div class="text-center">
			<a href="/orders/{{{ $order->id}}}/fit/{{{ array_shift($uncompleted_measurements) }}}" class="button">Add Missing Measurements</a>
		</div>
	@else
		<p>We will soon offer a flight jacket and a moto. <br> <a class="underlined" href="{{{ env('SITE_URL') }}}/jackets?jacket-updates">Sign up here</a> if you would like to be one of the first to know about them.</p>
	@endif
@stop
