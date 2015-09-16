<div class="row collapse medium-uncollapse order-summary">
	<div class="large-12 medium-12 small-12 columns">
		<img class="customization-image" src="/images/photos/jackets/{{{ $order->jacket->model }}}/hardware-{{{ $order->hardware_color()->name }}}.jpg">
	</div>
	<h2 class="large-12 medium-12 small-12 columns">Your {{{ $order->jacket->name }}}</h2>
	<div class="large-12 medium-6 small-12 columns">
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

	<div class="large-12 medium-6 small-12 columns">
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

	<div class="large-12 medium-6 small-12 columns hide-for-large-up">
		<h3 class="thin left">Shipping Info</h3>
		<a ng-click="changeAddress()" class="right underlined">Change</a>
		<div class="clearfix"></div>
		<ul class="no-bullet value-list">
			<li><small class="list-key">Name</small><strong>@{{ address.name }}</strong></li>
			<li><small class="list-key">Email</small><strong><a href="" title=""  data-reveal-id="myModal" class="underlined">{{{ $order->user->email }}}</a></strong></li>
			<li><small class="list-key">Address 1</small><strong>@{{ address.address1 }}</strong></li>
			<li><small class="list-key">Address 2</small><strong>@{{ address.address2 }}</strong></li>
			<li><small class="list-key">City</small><strong>@{{ address.city }}</strong></li>
			<li><small class="list-key">Zip / Post Code</small><strong>@{{ address.postcode }}</strong></li>
			<li><small class="list-key">State / Province</small><strong>@{{ address.province }}</strong></li>
			<li><small class="list-key">Country</small><strong>@{{ address.country }}</strong></li>
		</ul>
	</div>

	<div class="large-6 medium-6 small-12 columns hide-for-large-up">
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


<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
		@if (Auth::guest())
			<section class="large-6 medium-8 small-12 medium-centered large-centered columns panel">
				<p><strong>Enter an email address and choose a password to continue.</strong><br> It lets us save your design choices and body measurements. <br> <br>Use your existing credentials if you've already created an account.</p>
				<p><em>We don’t spam or share your information.</em></p>
				@include('partials.checkout.user-registration-form')
		@elseif (Auth::user()->unfinishedOrders()->count() > 0)
			<section class="large-6 medium-8 small-12 medium-centered large-centered columns panel">
				<p>Looks like you're logged in as <strong>{{{ Auth::user()->email }}}</strong></p>
				<div class="text-center">
					<a href="" ng-click="proceedToOrder()" class="button expand">Continue Your Order</a>
					<p>or</p>
					<a href="{{ url('/auth/logout') }}" class="underlined">Log in as someone else</a>
				</div>
		@else
			<section class="large-6 medium-8 small-12 medium-centered large-centered columns">
				<a href="" ng-click="proceedToOrder()" class="button expand">Proceed To Measurement</a>
		@endif
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>