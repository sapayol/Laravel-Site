@extends('layouts/email')

@section('title')
	Ready to finalize your jacket?
@stop

@section('row1')
	Hi {{{ $order->user->name }}},
@stop

@section('row2')
	<p>
		I see that you’ve started to individualize a custom tailored {{{ $order->jacket->name }}}.
		We saved the work you’ve done so far and you can pick up right where you left off.
	</p>
@stop

@section('row3')
	<div class="text-center">
		<img style="width: 350px" src="/images/photos/jackets/{{{ $order->jacket->model }}}/hardware-{{{ $order->hardware_color()->name }}}.jpg" alt="Jacket Photo">
	</div>
@stop

@section('row4')
	<table>
		<tbody>
			<tr>
				<td width="250px">
					@include('partials.emails.jacket-info')
				</td>
				<td width="250px">
					@include('partials.emails.your-measurements')
				</td>
			</tr>
		</tbody>
	</table>
@stop

@section('row5')
	<p class="text-center">
			<br><br>
		<a href="{{{ env('SITE_URL') }}}/orders/{{{ $order->id }}}" class="button">Finish Your Order</a>
			<br><br><br>
	</p>
@stop

@section('row6')
	<p>
		<em>
			If you have any questions or concerns, reply to this email and I’ll get back to you.
		</em>
	</p>
@stop
