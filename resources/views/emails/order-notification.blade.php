@extends('layouts/email')

@section('title')
	A new {{{ $order->jacket->name }}} has been ordered
@stop

@section('row1')
	A new {{{ $order->jacket->name }}} has just been ordered on <a href="{{{ env('SITE_URL') }}}">sapayol.com</a>
@stop

@section('row2')
	<br><br>
	<div class="text-center">
		<a href="{{{ env('SITE_URL') }}}//admin/orders/{{{ $order->id }}}" class="button">View Order</a>
	</div>
	<br>
@stop

@section('row3')
	<table>
		<tbody>
			<tr>
				<td width="250px">@include('partials.emails.order-info')</td>
				<td width="250px">@include('partials.emails.jacket-info')</td>
			</tr>
			<tr>
				<td width="250px">
					@include('partials.emails.payment-info')
					<br>
					<a href="https://dashboard.stripe.com/payments/{{{ $order->payment_id }}}" class="underlined">View Stripe Payment</a>
				</td>
				<td width="250px">@include('partials.emails.body-measurements')</td>
			</tr>
		</tbody>
	</table>
@stop