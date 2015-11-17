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
		<td width="250px">@include('partials.emails.order-info')</td>
		@if (isset($inclusions['look']))
			<td width="250px">@include('partials.emails.jacket-info')</td>
		@else
			<td width="250px"></td>
		@endif
	</tr>
	<tr>
		@if (isset($inclusions['body_fit']))
			<td width="250px">@include('partials.emails.body-measurements')</td>
		@else
			<td width="250px"></td>
		@endif
		@if (isset($inclusions['product_fit']))
			<td width="250px">@include('partials.emails.jacket-measurements')</td>
		@else
			<td width="250px"></td>
		@endif
	</tr>
@stop