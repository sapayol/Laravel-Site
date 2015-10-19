@extends('layouts/default')

@section('title')
	Order: {{{ $order->id }}}
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
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>{{{ $order->id }}}</td>
			<td>{{{ $order->status }}}</td>
			<td>{{{ $order->jacket->model }}}</td>
			<td>{{{ $order->created_at }}}</td>
			<td>{{{ $order->updated_at }}}</td>
			<td><a href="{{{ route('admin.edit-order', $order->id) }}}">Edit</a></td>
		</tr>
	</tbody>
</table>

@stop
