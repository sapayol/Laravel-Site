@extends('layouts/default')

@section('title')
  Your Profile
@stop

@section('page_wrap_class')
  nav-item-page
@stop

@section('header')
	<h1>Your Profile</h1>
@stop

@section('main')
	<section class="large-12 medium-12 small-12 columns">
		<h4>{{{ $user->name }}}</h4>
		<h5>{{{ $user->email }}}</h5>
	</section>
	@if ($user->orders)
		<section class="large-12 medium-12 small-12 columns">
			<h2>Orders</h2>
			<table class="table">
				<thead>
					<tr>
						<th>#</th>
						<th>Status</th>
						<th>Measurements</th>
						<th>&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($user->orders as $order)
						<tr>
							<td>{{{ $order->id }}} </td>
							<td>{{{ $order->status }}} </td>
							<td>
								@if ($order->bodyMeasurements && $order->bodyMeasurements->completed())
									@foreach ($order->bodyMeasurements->completed() as $measurement)
										<small>{{{ $measurement }}} <strong>{{{ $order->bodyMeasurements->$measurement }}}</strong></small><br>
									@endforeach
								@else
									<small>N/A</small>
								@endif
							</td>
							<td><a href="{{{ route('orders.show', $order->id) }}}" title="">View</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</section>
	@endif

@stop

