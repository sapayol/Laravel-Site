@extends('03-templates/default')

@section('title')
	Fit | Units
@stop

@section('main')

	<section>
		<p class="large-12 medium-12 small-12 columns">
			To begin, please choose which units you'll be measuring in
		</p>

		<form class="large-6 medium-6 small-6 columns" action="/orders/{{{ $order->id}}}/fit/half-shoulder" method="POST">
		  <input type="hidden" name="units" value="cm">
		  <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
			<button type="submit" class="black button expand">Centimeters</button>
		</form>

		<form class="large-6 medium-6 small-6 columns" action="/orders/{{{ $order->id}}}/fit/half-shoulder" method="POST">
		  <input type="hidden" name="units" value="in">
		  <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
			<button type="submit" class="black button expand">Inches</button>
		</form>
	</section>

@stop




