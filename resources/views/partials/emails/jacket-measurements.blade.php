<h3 class="thin left">Jacket Measurements</h3>
<br>
<ul class="no-bullet value-list">
	<?php $measurements = ['height', 'half_shoulder', 'back_width', 'chest', 'stomach', 'back_length', 'waist', 'arm', 'biceps', 'note'];  ?>
	@foreach ($measurements as $measurement)
		<li>
			<small class="list-key">{{{ ucwords(str_replace('_', ' ', $measurement)) }}}</small>
			<span class="list-value">
				@if ($order->productMeasurements->units == 'in')
					<strong decimal-to-fraction="{{{ $order->productMeasurements->$measurement }}}">{{{ $order->productMeasurements->$measurement }}}</strong> "
				@else
					<strong>{{{ $order->productMeasurements->$measurement != round($order->productMeasurements->$measurement) ?  round($order->productMeasurements->$measurement, 1) : round($order->productMeasurements->$measurement) }}}</strong> cm
				@endif
			</span>
		</li>
	@endforeach
</ul>