@extends('layouts/default')

@section('title')
Admin
@stop

@section('header')
	<a ng-click="displayMenu = false">Dashboard</a>
@stop

@section('main')
	<div class="large-12 medium-12 small-12 columns">
		<br>
		<h3 class="left">Latest Orders</h3><a class="right" href="{{{ route('admin.order-index') }}}">All Orders</a>
	</div>

	<table class="compact-table full-width">
		<thead>
			<tr>
				<th>#</th>
				<th>Status</th>
				<th>Model</th>
				<th>Last Update</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($orders as $order)
				<tr>
					<td><a href="{{{ route('admin.show-order', $order->id) }}}">{{{ $order->id }}}</a></td>
					<td>{{{ ucfirst($order->status) }}}</td>
					<td>{{{ $order->jacket->name }}}</td>
					<td>{{{ date('Y-m-d', strtotime($order->updated_at)) }}} <small>{{{ date('h:i a', strtotime($order->updated_at)) }}}</small></td>
				</tr>
			@endforeach
		</tbody>
	</table>

	<section class="large-12 medium-12 small-12 columns">
		<label for="order_number" class="text-input-label">
			<span class="label-title">Order Number</span>
			<input id="order_number" name="order_number" type="text" ng-model="order_number">
		</label>
		<a href="/admin/orders/@{{ order_number }}" class="button small expand">View Order</a>
	</section>
@stop
