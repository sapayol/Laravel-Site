@extends('03-templates/default')

@section('title')
	Fit | Units
@stop

@section('main')

	<section class="large-12 medium-12 small-12 columns  ">
		<form action="/orders/{{{ $order->id}}}/fit/complete" method="POST">
			<p>Please let us know if you have any additional information you want us to know about your measurements</p>

			<label for="note">
				<span class="label-title">Note</span>
				<textarea name="measurements[note]" id="note" rows=4></textarea>
				<span class="input-units">@{{ units }}</span>
			</label>

		  <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
			<button type="submit" class="black button expand">Submit Measurements</button>
		</form>
	</section>

@stop

@section('footer')
	@include('02-organisms.jacket.measurement-tracker')
@stop


