	<h2><br class="show-for-large-up">Your {{{ $order->jacket->name }}}</h2>
	<img class="customization-image" src="/images/photos/jackets/{{{ $order->jacket->model }}}/hardware-{{{ $order->hardware_color()->name }}}.jpg">
	<h3 class="thin left">Look</h3>
	<a href="/jackets/{{{ $order->jacket->model }}}/look" class="right underlined">Change</a>
	<div class="clearfix"></div>
	<ul class="no-bullet value-list">
		<li><small class="list-key">Leather Type </small><strong>{{{ ucfirst($order->leather_type()->name)  }}}	</strong></li>
		<li><small class="list-key">Leather Color </small><strong>{{{ ucfirst($order->leather_color()->name) }}}	</strong></li>
		<li><small class="list-key">Lining Color </small><strong>{{{ ucfirst($order->lining_color()->name) }}}	</strong></li>
		<li><small class="list-key">Hardware Color </small><strong>{{{ ucfirst($order->hardware_color()->name) }}}	</strong></li>
	</ul>

	<h3 class="thin left">Fit</h3>
	<div class="clearfix"></div>
	<ul class="no-bullet value-list">
		<?php $measurements = ['height', 'half_shoulder', 'back_width', 'chest', 'stomach', 'back_length', 'waist', 'arm', 'biceps', 'note'];  ?>
		@foreach ($measurements as $measurement)
			@if ($measurement == 'note')
				<li><br></li>
			@endif
			<li>
				<small class="list-key">{{{ ucwords(str_replace('_', ' ', $measurement)) }}}</small>
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

