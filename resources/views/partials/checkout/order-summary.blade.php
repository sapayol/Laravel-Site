@include('partials.jacket.preview-image')

	<?php
	  $leather_type = null !== $order->leather_type() ? $order->leather_type()->name : 'empty';
	  $leather_color = null !== $order->leather_color() ? $order->leather_color()->name : 'empty';
	  $lining_color = null !== $order->lining_color() ? $order->lining_color()->name : 'empty';
	  $hardware_color = null !== $order->hardware_color() ? $order->hardware_color()->name : 'empty';
	?>


	<section class="large-6 medium-6 small-12 columns">
		<h3 class="thin left">Look</h3>
		<a href="/orders/{{{ $order->id }}}" class="right underlined">Change</a>
		<div class="clearfix"></div>
		<ul class="no-bullet value-list">
			<li><small class="list-key">Model</small><strong>{{{ ucfirst($order->jacket->name)  }}}	</strong></li>
			<li><small class="list-key">Leather Type </small><strong>{{{ ucfirst($leather_type)  }}}	</strong></li>
			<li><small class="list-key">Leather Color </small><strong>{{{ ucfirst($leather_color) }}}	</strong></li>
			<li><small class="list-key">Lining Color </small><strong>{{{ ucfirst($lining_color) }}}	</strong></li>
			<li><small class="list-key">Hardware Color </small><strong>{{{ ucfirst($hardware_color) }}}	</strong></li>
			@if ($order->collar_color())
				<li><small class="list-key">Collar Color </small><strong>{{{ ucfirst($order->collar_color()->name) }}}	</strong></li>
			@endif
		</ul>
	</section>


	<section class="large-6 medium-6 small-12 columns">
		<h3 class="thin left">Fit</h3>
		<div class="clearfix"></div>
		<ul class="no-bullet value-list">
			<?php $measurements = ['height', 'half_shoulder', 'back_width', 'chest', 'stomach', 'back_length', 'waist', 'arm', 'biceps', 'note'];  ?>
			@foreach ($measurements as $measurement)
				@if ($measurement == 'note')
					<li><br></li>
					<li class="note-row">
						<small class="left list-key">{{{ ucwords(str_replace('_', ' ', $measurement)) }}}</small>
						<a class="underlined" href="/orders/{{{ $order->id }}}/fit/{{{ $measurement }}}" title="">
							<span>{{{ $order->bodyMeasurements->$measurement ? 'Change' : 'Add' }}}</span>
						</a>
						<div class="list-value"><em>{{{ $order->bodyMeasurements->$measurement }}}</em></div>
					</li>
				@else
					<li>
						<small class="list-key">{{{ ucwords(str_replace('_', ' ', $measurement)) }}}</small>
						@if ($order->bodyMeasurements->$measurement)
								<span class="list-value">
								@if ($order->bodyMeasurements->units == 'in')
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
				@endif
			@endforeach
		</ul>
	</section>
	<div class="clearfix"></div>

