<h3 class="thin left">Jacket Measurements</h3>
<br>
<ul style="list-style: none; margin-left: 0; padding-left: 0;">
	<?php $measurements = ['height', 'half_shoulder', 'back_width', 'chest', 'stomach', 'back_length', 'waist', 'arm', 'biceps'];  ?>
	@foreach ($measurements as $measurement)
		<li>
			<small style="font-size: 85%; display: inline-block; min-width: 90px;">{{{ ucwords(str_replace('_', ' ', $measurement)) }}}</small>
			<span>
				@if ($order->productMeasurements->units == 'in')
					<strong decimal-to-fraction="{{{ $order->productMeasurements->$measurement }}}">{{{ $order->productMeasurements->$measurement }}}</strong> "
				@else
					<strong>{{{ $order->productMeasurements->$measurement != round($order->productMeasurements->$measurement) ?  round($order->productMeasurements->$measurement, 1) : round($order->productMeasurements->$measurement) }}}</strong> cm
				@endif
			</span>
		</li>
	@endforeach
</ul>