@extends('03-templates/measurements')

@section('title')
	Waist
@stop

@section('input_options')
	@if ($order->userMeasurements->units == 'in')
		min="28" max="40"
	@else
		min="72" max="100"
	@endif
@stop

@section('instructions')
	<p>Measure around the hips, right where your jacket length measurement ended.</p>
	<ul>
		<li>Leave enough space to fit a finger under the measure tape.</li>
		<li>Don’t wear a belt for this measurement.</li>
		<li>This is about a hand width lower than your “natural waist”.</li>
	</ul>
@stop



