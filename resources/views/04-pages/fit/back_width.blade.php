@extends('03-templates/measurements')

@section('title')
	Back Width
@stop

@section('input_options')
	@if ($order->userMeasurements->units == 'in')
		min="20" max="80"
	@else
		min="85" max="110"
	@endif
@stop

@section('instructions')
	<p>On each side of your back, find the spot that's halfway between the shoulder point (where your shoulder measurement ended) and the arm crease. Your measurement will start and end slightly above those points.</p>
@stop






