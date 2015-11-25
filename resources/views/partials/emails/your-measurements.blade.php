<h3 class="thin left">Your Measurements</h3>
<br>
<ul style="list-style: none; margin-left: 0; padding-left: 0;">
	<?php $measurements = ['height', 'half_shoulder', 'back_width', 'chest', 'stomach', 'back_length', 'waist', 'arm', 'biceps', 'note'];  ?>
	@foreach ($measurements as $measurement)
		@if ($order->bodymeasurements->$measurement)
			<li>
				<small style="font-size: 85%; display: inline-block; min-width: 90px;">{{{ ucwords(str_replace('_', ' ', $measurement)) }}}</small>
				<span>
					@if ($order->bodyMeasurements->units == 'in')
						<strong decimal-to-fraction="{{{ $order->bodyMeasurements->$measurement }}}">{{{ $order->bodyMeasurements->$measurement }}}</strong> {{{ $measurement !== 'note' ? '"' : '' }}}
					@else
						<strong>{{{ $order->bodyMeasurements->$measurement != round($order->bodyMeasurements->$measurement) ?  round($order->bodyMeasurements->$measurement, 1) : round($order->bodyMeasurements->$measurement) }}}</strong> cm
					@endif
				</span>
			</li>
		@endif
	@endforeach
</ul>