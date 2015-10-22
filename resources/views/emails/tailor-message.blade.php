@extends('layouts/email')

@section('title')
	Sapayol Jacket Order: {{{ $order->id }}}
@stop

@section('main')

@if (isset($note))
	<p>{{{ $note }}}</p>
@endif

<table>
	<tbody>
		<tr>
			<td>Order #</td>
			<td>{{{ $order->id }}}</td>
		</tr>
		<tr>
			<td>Placed On:</td>
			<td>{{{ date('Y-m-d h:i', strtotime($order->paid_at)) }}}</td>
		</tr>
	</tbody>
</table>

@if (!isset($inclusions['look']))
	<table>
		<caption>Look</caption>
		<tbody>
			<tr>
				<td>Leather Type</td>
				<td>{{{ ucwords($order->leather_type()->name) }}}</td>
			</tr>
			<tr>
				<td>Leather Color</td>
				<td>{{{ ucwords($order->leather_color()->name) }}}</td>
			</tr>
			<tr>
				<td>Lining Color</td>
				<td>{{{ ucwords($order->lining_color()->name) }}}</td>
			</tr>
			<tr>
				<td>Hardware Color</td>
				<td>{{{ ucwords($order->hardware_color()->name) }}}</td>
			</tr>
		</tbody>
	</table>
@endif


@if (!isset($inclusions['body_fit']))
	<table>
		<caption>Body Measurements</caption>
		<tbody>
			@foreach ($order->bodyMeasurements->measurement_names as $name)
				<tr>
					<td>{{{ ucwords(str_replace('_', ' ', $name)) }}}</td>
					<td>{{{ $order->bodyMeasurements->$name }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

@if (!isset($inclusions['product_fit']))
	<table>
		<caption>Product Measurements</caption>
		<tbody>
			@foreach ($order->productMeasurements->measurement_names as $name)
				<tr>
					<td>{{{ ucwords(str_replace('_', ' ', $name)) }}}</td>
					<td>{{{ $order->bodyMeasurements->$name }}}</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@endif

@stop