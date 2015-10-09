@extends('layouts/default')


@section('page_wrap_class')
	four-levels
@endsection


@section('title')
	Fit | Units
@stop

@section('main')

	<section class="large-6 medium-10 small-12 columns large-centered medium-centered">
		<p>
			We will walk you through every measurement we need to fit your {{{ $order->jacket->name }}} to your body. It's very simple.
			<br><br>
			All you need is a tape measure.
		</p>
		<ul>
			<li>Don’t wear anything thicker than an undershirt or tight t-shirt.</li>
			<li>Don't round your measurements to whole numbers.</li>
			<li><em>It's much easier and more accurate if a friend helps you.</em></li>
		</ul>
	</section>

	<section class="large-6 medium-10 small-12 columns large-centered medium-centered text-center">
		<p class="text-left"><strong>Will you be measuring in inches or centimeters?</strong></p>
		<form action="/orders/{{{ $order->id }}}/fit" method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
			<input type="hidden" name="measurements[units]" value="in"/>
			<button type="submit" class="black button expand">Inches</button>
		</form>

		<p>or</p>

		<form action="/orders/{{{ $order->id }}}/fit" method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
			<input type="hidden" name="measurements[units]" value="cm"/>
			<button type="submit" class="black button expand">Centimeters</button>
		</form>
	</section>
@stop




