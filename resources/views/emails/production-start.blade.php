@extends('layouts/email')

@section('title')
	Our tailors have started working on your {{{ $order->jacket->name }}}
@stop

@section('row2')
	<h4>Hi {{{ $order->user->name }}},</h4>
@stop

@section('row3')
	Our tailors are working on your {{{ $order->jacket->name }}} right now. After cutting the necessary pieces from our leather, four tailors are involved in crafting your jacket over a period of seven hours, at the minimum.
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