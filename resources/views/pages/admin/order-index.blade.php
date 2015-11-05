@extends('layouts/default')

@section('title')
	{{{ $status }}} Orders
@stop

@section('main')
	<div class="large-12 medium-12 small-12 columns text-center">
		<br>
		<ul class="sub-nav no-bullet inline-list">
		  <li class="{{{ $status == null ? 'active' : '' }}}" >
		  	<a class="underlined" href="{{{ route('admin.order-index') }}}">All</a>
		  </li>
		  <li class="{{{ $status == 'started' ? 'active' : '' }}}" >
		  	<a class="underlined" href="{{{ route('admin.order-index', ['status' => 'started']) }}}">Started</a>
		  </li>
		  <li class="{{{ $status == 'paid' ? 'active' : '' }}}" >
		  	<a class="underlined" href="{{{ route('admin.order-index', ['status' => 'paid']) }}}">Paid</a>
		  </li>
		  <li class="{{{ $status == 'shipped' ? 'active' : '' }}}" >
		  	<a class="underlined" href="{{{ route('admin.order-index', ['status' => 'shipped']) }}}">Shipped</a>
		  </li>
		  <li class="{{{ $status == 'completed' ? 'active' : '' }}}" >
		  	<a class="underlined" href="{{{ route('admin.order-index', ['status' => 'completed']) }}}">Completed</a>
		  </li>
		</ul>
	</div>

	<table class="large-12 medium-12 small-12 columns compact-table">
		<thead>
			<tr>
				<th>#</th>
				<th>Status</th>
				<th>Model</th>
				<th class="show-for-medium-up">Customer</th>
				<th class="show-for-large">Measurements</th>
				<th>Last Update</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($orders as $order)
				<tr>
					@if ($order->status == 'new')
						<td><strong>{{{ $order->id }}}</strong></td>
					@else
						<td><a href="{{{ route('admin.show-order', $order->id) }}}"><strong>{{{ $order->id }}}</strong></a></td>
					@endif
					<td>{{{ ucfirst($order->status) }}}</td>
					<td>{{{ $order->jacket->name }}}</td>
					<td class="show-for-medium-up">{{{ $order->user->name }}} (<a href="mailto:{{{ $order->user->email }}}">{{{ $order->user->email }}}</a>)</td>
					<td class="show-for-large">
						@if ($order->bodyMeasurements)
							{{{ count($order->bodyMeasurements->completed()) }}} /  9
						@endif
					</td>
					<td>{{{ date('Y-m-d', strtotime($order->updated_at)) }}} <small>{{{ date('h:i a', strtotime($order->updated_at)) }}}</small></td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<div class="large-12 medium-12 small-12 columns text-center">
		{!! $orders->render() !!}
	</div>
@stop
