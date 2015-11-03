<div class="panel measurement-tracker">
	<h4 class="text-center">Your Measurements</h4>
	<ul class="no-bullet value-list">
		<li>
			<span class="list-key">Units</span>
			<span class="list-value">
				@if ($order->bodyMeasurements->units == 'cm')
					cm
				@else
					inches
				@endif
			</span>
			<form style="display: inline-block"  class="" action="/orders/{{{ $order->id }}}/switch_units" method="POST">
				<input type="hidden" name="_token" value="{!! csrf_token() !!}">
				<input type="hidden" name="_method" value="PATCH">
				<button class="text-button thin">Change</button>
			</form>
		</li>
		@foreach ($order->bodyMeasurements->measurement_names as $measurement)
			@if ($measurement != 'note')
				<li>
					<span class="list-key">{{{ ucwords(str_replace('_', ' ', $measurement)) }}}</span>
					@if ($order->bodyMeasurements->$measurement)
						<span class="list-value">
							@if ($order->bodyMeasurements->units == 'in')
								<strong decimal-to-fraction="{{{ $order->bodyMeasurements->$measurement }}}">{{{ $order->bodyMeasurements->$measurement }}}</strong> "
							@else
								<strong>{{{ $order->bodyMeasurements->$measurement != round($order->bodyMeasurements->$measurement) ?  round($order->bodyMeasurements->$measurement, 1) : round($order->bodyMeasurements->$measurement) }}}</strong> <small>cm</small>
							@endif
						</span>
						<a class="underlined" href="/orders/{{{ $order->id }}}/fit/{{{ $measurement }}}" title=""><span>Change</span></a>
					@endif
				</li>
			@endif
		@endforeach
	</ul>
</div>
