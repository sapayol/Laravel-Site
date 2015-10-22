<div class="panel measurement-tracker">
	<h4 class="text-center">Your Measurements</h4>
	<ul class="no-bullet value-list">
		@foreach ($order->bodyMeasurements->measurement_names as $measurement)
			@if ($measurement == 'note')
				<li><br></li>
			@endif
			<li>
				<span class="list-key">{{{ ucwords(str_replace('_', ' ', $measurement)) }}}</span>
				@if ($order->bodyMeasurements->$measurement)
					<span class="list-value">
						@if ($measurement == 'note')
							<em>{{{ $order->bodyMeasurements->$measurement }}}</em>
						@elseif ($order->bodyMeasurements->units == 'in')
							<strong decimal-to-fraction="{{{ $order->bodyMeasurements->$measurement }}}">{{{ $order->bodyMeasurements->$measurement }}}</strong> "
						@else
							<strong>{{{ $order->bodyMeasurements->$measurement != round($order->bodyMeasurements->$measurement) ?  round($order->bodyMeasurements->$measurement, 1) : round($order->bodyMeasurements->$measurement) }}}</strong> cm
						@endif
					</span>
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
			@if ($order->bodyMeasurements->units == 'in')
				<button class="text-button">Switch to <strong>centimeters</strong></button>
			@else
				<button class="text-button">Switch to <strong>inches</strong></button>
			@endif
		</form>
	</div>
</div>
