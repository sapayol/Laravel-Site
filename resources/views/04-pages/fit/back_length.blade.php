@extends('03-templates/measurements')

@section('title')
	Back Length
@stop

@section('input_options')
	@if ($order->userMeasurements->units == 'in')
		min="17" max="26"
	@else
		min="45" max="65"
	@endif
@stop

@section('instructions')
	<p>Bend your head forward. The highest bone on the back of your neck that sticks out is your starting point.</p>
	<p><em>Look straight ahead again for the measurement</em>.</p>
	<p>Wear pants that sit right on your hips, not trousers with a high waist that cover the belly button, and not saggy pants that expose your underwear – something in between. Measure to the end of the waistband. This should be about four fingers above your tailbone.</p>
	<p><em>Some people like a slightly shorter or longer jacket. We typically add around 2 1/4 inches (~ 6cm) to this measurment. You will be able to express your preference later. For now, measure as indicated in the video</em>.</p>
@stop




