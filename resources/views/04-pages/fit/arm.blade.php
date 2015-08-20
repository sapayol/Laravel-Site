@extends('03-templates/measurements')

@section('title')
	Arm
@stop

@section('input_options')
	@if ($order->userMeasurements->units == 'in')
		min="22" max="28"
	@else
		min="58" max="70"
	@endif
@stop

@section('instructions')
	<p>Start at the shoulder point (where you left off for the shoulder measurement).</p>
	<p>End right at the wrist, just after the bone that sticks out on the side of your little finger (head of ulna).</p>
	<p>Don’t go straight from the shoulder to your hand. Go along the arm, passing through the elbow.</p>
	<p><em>Some people like their sleeves a little longer, others a little shorter. You will be able to express your preference later. For now, measure as indicated in the video</em>.</p>
@stop





