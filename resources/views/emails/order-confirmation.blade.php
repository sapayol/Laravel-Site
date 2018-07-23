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
				<td width="250px">@include('partials.emails.order-info')</td>
				<td width="250px">@include('partials.emails.jacket-info')</td>
			</tr>
			<tr>
				<td width="250px">@include('partials.emails.payment-info')</td>
				<td width="250px">@include('partials.emails.your-measurements')</td>
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
			<a href="{{{ env('SITE_URL') }}}/orders/{{{ $order->id}}}/fit/{{{ array_shift($uncompleted_measurements) }}}" class="button">Add Missing Measurements</a>
		</div>
	@else
		<p>
  	  <a href="{{{ env('SITE_URL') }}}/care-instructions" class="button">See our Care Instructions</a>
	  </p>
	@endif
@stop
