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
				<td width="250px">@include('partials.emails.your-measurements')</td>
				<td width="250px">@include('partials.emails.jacket-measurements')</td>
			</tr>
		</tbody>
	</table>
@stop

@section('row4')
	<table>
		<tbody>
			<tr>
				<td width="250px">@include('partials.emails.order-info')</td>
				<td width="250px">@include('partials.emails.jacket-info')</td>
			</tr>
		</tbody>
	</table>
@stop

