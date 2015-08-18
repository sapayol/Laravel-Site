@extends('03-templates/default')

@section('title')
	Fit | Units
@stop

@section('main')

	<section class="large-12 medium-12 small-12 columns">
		<p>
			We will walk you through every measurement we need to fit your BLEECKER to your body. It's very simple.
			<br><br>
			All you need is a tape measure.
		</p>
		<ul>
			<li>Don’t wear anything thicker than an undershirt or tight t-shirt.</li>
			<li>Don't round any measurements. Give us fractions (20 1/4) or decimals (20.25).</li>
			<li><em>It's much easier and more accurate if a friend helps you.</em></li>
		</ul>
	</section>

	<section class="large-12 medium-12 small-12 columns text-center">
		<p class="text-left">Will you be measuring in inches or centimeters?</p>
		<form action="/orders/{{{ $order->id }}}/fit/height" method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
			<input type="hidden" name="measurements[units]" value="in"/>
			<button type="submit" class="black button expand">Inches</button>
		</form>

		<p>or</p>

		<form action="/orders/{{{ $order->id }}}/fit/height" method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
			<input type="hidden" name="measurements[units]" value="in"/>
			<button type="submit" class="black button expand">Centimeters</button>
		</form>
	</section>
@stop




