@extends('03-templates/measurements')

@section('title')
	Biceps
@stop

@section('input_options')
	@if ($order->userMeasurements->units == 'in')
		min="9" max="16"
	@else
		min="25" max="40"
	@endif
@stop

@section('instructions')
	<p>Measure around the biceps, with your muscles flexed.</p>
@stop




