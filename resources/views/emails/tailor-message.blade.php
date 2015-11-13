@extends('layouts/email')

@section('title')
Sapayol Jacket Order: {{{ $order->id }}}
@stop

@section('row1')
	@if (isset($note))
		<p>{{{ $note }}}</p>
		<br><br>
	@else
	 <p>
	 	Hi,
		<br><br>
		Here's the latest look order <strong>{{{ $order->id }}}</strong>
	 </p>
	@endif
@stop


@section('row2')
	<tr>
		<td>@include('partials.emails.order-info')</td>
		@if (isset($inclusions['look']))
			<td>@include('partials.emails.jacket-info')</td>
		@endif
	</tr>
	<tr>
		@if (isset($inclusions['body_fit']))
			<td>@include('partials.emails.body-measurements')</td>
		@endif
		@if (isset($inclusions['product_fit']))
			<td>@include('partials.emails.jacket-measurements')</td>
		@endif
	</tr>
@stop