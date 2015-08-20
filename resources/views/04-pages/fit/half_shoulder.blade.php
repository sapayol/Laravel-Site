@extends('03-templates/measurements')

@section('title')
	Half Shoulder
@stop

@section('input_options')
	@if ($order->userMeasurements->units == 'in')
		min="5" max="7"
	@else
		min="13" max="18"
	@endif
@stop

@section('instructions')
	<p>Raise your arm to shoulder level and a dimple will form at the shoulder bone. That’s where your measurement ends (the shoulder point).</p>
	<p>Start at the side of the neck, straight under your earlobe.</p>
	<p><em>You only need to measure one side</em>.</p>
@stop



