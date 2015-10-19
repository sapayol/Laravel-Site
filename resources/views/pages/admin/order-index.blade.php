@extends('layouts/default')

@section('title')
	All Orders
@stop

@section('main')

<table>
	<thead>
		<tr>
			<th>#</th>
			<th>Status</th>
			<th>Model</th>
			<th>Created</th>
			<th>Updated</th>
		</tr>
	</thead>
	<tbody>
		@foreach ($orders as $order)
			<tr>
				<td><a href="{{{ route('admin.show-order', $order->id) }}}">{{{ $order->id }}}</a></td>
				<td>{{{ ucfirst($order->status) }}}</td>
				<td>{{{ $order->jacket->name }}}</td>
				<td>{{{ date('Y-m-d', strtotime($order->created_at)) }}} <small>{{{ date('h:i a', strtotime($order->created_at)) }}}</small></td>
				<td>{{{ date('Y-m-d', strtotime($order->updated_at)) }}} <small>{{{ date('h:i a', strtotime($order->updated_at)) }}}</small></td>
			</tr>
		@endforeach
	</tbody>
</table>

@stop
