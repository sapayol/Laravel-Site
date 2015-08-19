@extends('03-templates/default')

@section('title')
	Fit | Heights
@stop

@section('main')
	<section class="large-12 medium-12 small-12 columns inverted-colors measurement-entry">
		<form action="/orders/{{{ $order->id }}}/fit/half_shoulder" method="POST">
			<p>How tall are you?</p>
			<label for="height" class="text-input-label">
				<span class="label-title">Height</span>
				<input name="measurements[height]" id="height" type="tel" placeholder="00.00" ng-model="height" maxlength="6" mask="99999" required>
				<span class="input-units">{{{ $order->measurement->units }}}</span>
			</label>

		  <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
			<br><br>
			<button type="submit" class="black button expand inverted-colors">Save Measurement</button>
		</form>
	</section>
@stop




