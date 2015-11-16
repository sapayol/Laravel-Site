@extends('layouts/email')

@section('title')
	Your {{{ $order->jacket->name }}} has been handed over to the courier
@stop

@section('row1')
	Hi {{{ $order->user->name }}},
@stop

@section('row2')
	We’ve carefully packaged your {{{ $order->jacket->name }}} and it has left our atelier. As you know, at SAPAYOL we’re usually all about taking the unbeaten path and enjoying the journey. This is an exception.
@stop

@section('row3')
	<p>
		Your {{{ $order->jacket->name }}} is being shipped express to:
	</p>

	<ul style="list-style: none;" class="value-list">
		<li><strong>{{{ $order->user->name }}}</strong></li>
		<li><strong>{{{ $order->address->address1 }}}</strong></li>
		@if ($order->address->address2 )
			<li><strong>{{{ $order->address->address2 }}}</strong></li>
		@endif
		<li><strong>{{{ $order->address->city }}}, {{{ $order->address->province }}} {{{ $order->address->postcode }}}</strong></li>
		<li><strong>{{{ $order->address->country }}}</strong></li>
	</ul>
@stop


@section('row4')
	<p style="text-align: center;">
		<br><br>
		<a href="https://track.aftership.com/{{{ $order->tracking_number }}}" class="button underlined">Track Your Package</a>
	</p>
@stop

@section('row5')
	<em>
		Be aware that it might take our logistics partner some time to correctly display the status of the shipment.
	</em>
@stop

@section('row6')
	<table>
		<tbody>
			<tr>
				<td width="250px">
					@include('partials.emails.jacket-info')
				</td>
				<td width="250px">
					@include('partials.emails.jacket-measurements')
				</td>
			</tr>
		</tbody>
	</table>
@stop
