@extends('layouts/email')

@section('title')
	Final measurements for your {{{ $order->jacket->name }}}
@stop

@section('row1')
	Hi {{{ $order->user->name }}},
@stop


@section('row2')
	<p>
		This email confirms what we’ve been discussing regarding the fit of your {{{ $order->jacket->name }}}. Please take a close look again at the final measurements and let us know within the next 12 hours if you see something unexpected.
	</p>
@stop


@section('row3')
	<p>
		Our tailors are going to work on your jacket based on the following measurements:
	</p>
	<table>
		<tbody>
			<tr>
				<td width="250px">
					<h3 class="thin left">Your Measurements</h3>
					<br>
					<ul class="value-list">
						<?php $measurements = ['height', 'half_shoulder', 'back_width', 'chest', 'stomach', 'back_length', 'waist', 'arm', 'biceps', 'note'];  ?>
						@foreach ($measurements as $measurement)
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
						@endforeach
					</ul>
				</td>
				<td width="250px">
					<h3 class="thin left">Jacket Measurements</h3>
					<br>
					<ul class="no-bullet value-list">
						<?php $measurements = ['height', 'half_shoulder', 'back_width', 'chest', 'stomach', 'back_length', 'waist', 'arm', 'biceps', 'note'];  ?>
						@foreach ($measurements as $measurement)
							<li>
								<small class="list-key">{{{ ucwords(str_replace('_', ' ', $measurement)) }}}</small>
								<span class="list-value">
									@if ($order->productMeasurements->units == 'in')
										<strong decimal-to-fraction="{{{ $order->productMeasurements->$measurement }}}">{{{ $order->productMeasurements->$measurement }}}</strong> "
									@else
										<strong>{{{ $order->productMeasurements->$measurement != round($order->productMeasurements->$measurement) ?  round($order->productMeasurements->$measurement, 1) : round($order->productMeasurements->$measurement) }}}</strong> cm
									@endif
								</span>
							</li>
						@endforeach
					</ul>
				</td>
			</tr>
		</tbody>
	</table>
@stop


@section('row4')
	NOTES
	<br>
	<br>
	<br>
	<hr>
@stop

@section('row5')
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
		</tbody>
	</table>
@stop

