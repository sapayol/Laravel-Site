@extends('03-templates/measurements')

@section('title')
	Stomach
@stop

@section('input_options')
	@if ($order->userMeasurements->units == 'in')
		min="28" max="40"
	@else
		min="72" max="100"
	@endif
@stop

@section('instructions')
	<p>Measure horizontally around the body, just above the hipbones (for most people, that’s right across your belly button).</p>
	<p>Leave enough space to fit a finger under the measure tape. </p>
@stop

