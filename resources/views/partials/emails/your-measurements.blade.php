<h3 class="thin left">Your Measurements</h3>
<br>
<ul class="value-list">
	<?php $measurements = ['height', 'half_shoulder', 'back_width', 'chest', 'stomach', 'back_length', 'waist', 'arm', 'biceps', 'note'];  ?>
	@foreach ($measurements as $measurement)
		@if ($order->bodymeasurements->$measurement)
			<li>
				<small class="list-key">{{{ ucwords(str_replace('_', ' ', $measurement)) }}}</small>
				<span class="list-value">
					@if ($order->bodyMeasurements->units == 'in')
						<strong decimal-to-fraction="{{{ $order->bodyMeasurements->$measurement }}}">{{{ $order->bodyMeasurements->$measurement }}}</strong> "
					@else
						<strong>{{{ $order->bodyMeasurements->$measurement != round($order->bodyMeasurements->$measurement) ?  round($order->bodyMeasurements->$measurement, 1) : round($order->bodyMeasurements->$measurement) }}}</strong> cm
					@endif
				</span>
			</li>
		@endif
	@endforeach
</ul>