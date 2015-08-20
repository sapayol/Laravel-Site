@extends('03-templates/measurements')

@section('title')
	Chest
@stop

@section('input_options')
	@if ($order->userMeasurements->units == 'in')
		min="33" max="44"
	@else
		min="85" max="110"
	@endif
@stop

@section('instructions')
	<p>This measurement goes around the widest part of your chest, right across your nipples.</p>
	<ul>
		<li>Make sure that the measure tape is horizontal on the back too.</li>
		<li>Keep your arms hanging.</li>
		<li>Breathe naturally. Don’t puff your chest out.</li>
		<li>Leave enough space to fit a finger under the measure tape.</li>
	</ul>
@stop



