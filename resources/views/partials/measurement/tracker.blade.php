<?php $measurements = ['height', 'half_shoulder', 'back_width', 'chest', 'stomach', 'back_length', 'waist', 'arm', 'biceps', 'note'];  ?>
<div class="large-12 medium-12 small-12 columns panel measurement-tracker">
	<h4 class="text-center">Your Measurements</h4>
	<ul class="no-bullet value-list">
		@foreach ($measurements as $measurement)
			@if ($measurement == 'note')
				<li><br></li>
			@endif
			<li>
				<span class="list-key">{{{ ucwords(str_replace('_', ' ', $measurement)) }}}</span>
				@if ($order->userMeasurements->$measurement)
					<span class="list-value">
					@if ($order->userMeasurements->units == 'in')
						<strong decimal-to-fraction="{{{ $order->userMeasurements->$measurement }}}">{{{ $order->userMeasurements->$measurement }}}</strong>
					@else
						<strong>{{{ $order->userMeasurements->$measurement }}}</strong>
					@endif
					{{{ $order->userMeasurements->units }}}</span>
					<a class="underlined" href="/orders/{{{ $order->id }}}/fit/{{{ $measurement }}}" title=""><span>Change</span></a>
				@else
					<span class="list-value"></span>
					<a class="underlined" href="/orders/{{{ $order->id }}}/fit/{{{ $measurement }}}" title=""><span>Add</span></a>
				@endif
			</li>
		@endforeach
	</ul>

	<div>
		<form action="/orders/{{{ $order->id }}}/switch_units" method="POST">
			<input type="hidden" name="_token" value="{!! csrf_token() !!}">
			<input type="hidden" name="_method" value="PATCH">
			@if ($order->userMeasurements->units == 'in')
				<button class="text-button">Switch to <strong>centimeters</strong></button>
			@else
				<button class="text-button">Switch to <strong>inches</strong></button>
			@endif
		</form>
	</div>
</div>
