<div class="row collapse order-summary">
	<div class="large-4 medium-4 small-12 columns">
		<img class="customization-image" src="/images/photos/jackets/{{{ $order->jacket->model }}}/hardware-{{{ $order->hardware_color()->name }}}.jpg">
	</div>
	<div class="large-4 medium-4 small-12 columns">
		<h2>Your {{{ $order->jacket->name }}}</h2>
		<h3 class="thin left">Look</h3>
		<a href="/jackets/{{{ $order->jacket->model }}}/look" class="right underlined">Change</a>
		<div class="clearfix"></div>
		<ul class="no-bullet value-list">
			<li><small class="list-key">Leather Type </small><strong>{{{ ucfirst($order->leather_type()->name)  }}}	</strong></li>
			<li><small class="list-key">Leather Color </small><strong>{{{ ucfirst($order->leather_color()->name) }}}	</strong></li>
			<li><small class="list-key">Lining Color </small><strong>{{{ ucfirst($order->lining_color()->name) }}}	</strong></li>
			<li><small class="list-key">Hardware Color </small><strong>{{{ ucfirst($order->hardware_color()->name) }}}	</strong></li>
		</ul>
	</div>

	<div class="large-4 medium-4 small-12 columns">
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
					@if ($order->userMeasurements->$measurement)
						<span class="list-value">
							@if ($order->userMeasurements->units == 'in')
								<strong decimal-to-fraction="{{{ $order->userMeasurements->$measurement }}}">{{{ $order->userMeasurements->$measurement }}}</strong> "
							@else
								<strong>{{{ $order->userMeasurements->$measurement != round($order->userMeasurements->$measurement) ?  round($order->userMeasurements->$measurement, 1) : round($order->userMeasurements->$measurement) }}}</strong> cm
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
	</div>

	<div class="large-4 medium-6 small-12 columns">
		<h3 class="thin left">Shipping Info</h3>
		<a ng-click="changeAddress()" class="right underlined">Change</a>
		<div class="clearfix"></div>
		<ul class="no-bullet value-list">
			<li><small class="list-key">Name</small><strong>@{{ address.name }}</strong></li>
			<li><small class="list-key">Email</small><strong>{{{ $order->user->email }}}</strong></li>
			<li><small class="list-key">Address 1</small><strong>@{{ address.address1 }}</strong></li>
			<li><small class="list-key">Address 2</small><strong>@{{ address.address2 }}</strong></li>
			<li><small class="list-key">City</small><strong>@{{ address.city }}</strong></li>
			<li><small class="list-key">Zip / Post Code</small><strong>@{{ address.postcode }}</strong></li>
			<li><small class="list-key">State / Province</small><strong>@{{ address.province }}</strong></li>
			<li><small class="list-key">Country</small><strong>@{{ address.country }}</strong></li>
		</ul>
	</div>

	<div class="large-4 medium-6 small-12 columns">
		<h3 class="thin left">Payment Info</h3>
		<a ng-click="changePaymentInfo()" class="right underlined">Change</a>
		<div class="clearfix"></div>
		<ul class="no-bullet value-list">
			<li><small class="list-key">Method</small><strong>Credit</strong></li>
			<li><small class="list-key">Card Type</small><strong>@{{ card.brand }}</strong></li>
			<li><small class="list-key">Card Number</small><strong>@{{ card.last4 }}</strong></li>
			<li><small class="list-key">Expiration</small><strong>@{{ card.exp_month + "/" +  card.exp_year }}</strong></li>
			<li><small class="list-key">Total </small><strong>${{{ $order->jacket->price }}}	</strong></li>
		</ul>
	</div>
</div>