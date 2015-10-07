@extends('layouts/default')

@section('title')
  Your Profile
@stop

@section('page_wrap_class')
  four-levels
@stop

@section('header')
	<h1>Your Profile</h1>
@stop

@section('main')
	<section class="large-12 medium-12 small-12 columns">
		<h4>{{{ $user->name }}}</h4>
		<h5>{{{ $user->email }}}</h5>
	</section>
	<section class="large-12 medium-12 small-12 columns">
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
							@foreach ($order->userMeasurements->getCompleteMeasurements() as $measurement)
								<small>{{{ $measurement }}} <strong>{{{ $order->userMeasurements->$measurement }}}</strong></small><br>
							@endforeach
						</td>
						<td><a href="{{{ route('orders.show', $order->id) }}}" title="">View</a></td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</section>
@stop

