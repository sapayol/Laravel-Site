<div class="large-4 medium-4 small-12 columns">
	<img class="checkout-image right responsive-image" src="/images/stock-photos/jacket-1.jpg">
</div>
<div class="large-4 medium-4 small-12 columns">
	<h3 class="thin left">Look</h3>
	<a href="/jackets/{{{ $order->jacket->model }}}/look" class="right underlined">Change</a>
	<div class="clearfix"></div>
	<ul class="no-bullet value-list left">
		<li><small class="list-key">Jacket </small>{{{ $order->jacket->name }}}	</li>
		<li><small class="list-key">Leather Type </small>{{{ ucfirst($order->leather_type()->name)  }}}	</li>
		<li><small class="list-key">Leather Color </small>{{{ ucfirst($order->leather_color()->name) }}}	</li>
		<li><small class="list-key">Lining Color </small>{{{ ucfirst($order->lining_color()->name) }}}	</li>
		<li><small class="list-key">Hardware Color </small>{{{ ucfirst($order->hardware_color()->name) }}}	</li>
	</ul>
</div>

<div class="large-4 medium-4 small-12 columns">
	<h3 class="thin left">Fit</h3>
	<div class="clearfix"></div>
	<ul class="no-bullet value-list left">
		<li>
			<small class="list-key">Your Height</small>
			<span  class="list-value">{{{ $order->userMeasurements->height}}} {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/height" title=""><small>Change</small></a>
		</li>
		<li>
			<small class="list-key">Half Shoulder</small>
			<span  class="list-value">{{{ $order->userMeasurements->half_shoulder}}} {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/half_shoulder" title=""><small>Change</small></a>
		</li>
		<li>
			<small class="list-key">Back Width</small>
			<span  class="list-value">{{{ $order->userMeasurements->back_width}}} {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/back_width" title=""><small>Change</small></a>
		</li>
		<li>
			<small class="list-key">Chest</small>
			<span  class="list-value">{{{ $order->userMeasurements->chest}}} {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/chest" title=""><small>Change</small></a>
		</li>
		<li>
			<small class="list-key">Belly / Stomach</small>
			<span  class="list-value">{{{ $order->userMeasurements->stomach}}} {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/stomach" title=""><small>Change</small></a>
		</li>
		<li>
			<small class="list-key">Back Length</small>
			<span  class="list-value">{{{ $order->userMeasurements->back_length}}} {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/back_length" title=""><small>Change</small></a>
		</li>
		<li>
			<small class="list-key">Waist</small>
			<span  class="list-value">{{{ $order->userMeasurements->waist}}} {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/waist" title=""><small>Change</small></a>
		</li>
		<li>
			<small class="list-key">Arm</small>
			<span  class="list-value">{{{ $order->userMeasurements->arm}}} {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/arm" title=""><small>Change</small></a>
		</li>
		<li>
			<small class="list-key">Biceps</small>
			<span  class="list-value">{{{ $order->userMeasurements->biceps}}} {{{ $order->userMeasurements->units }}}</span>
			<a class="underlined" href="/orders/{{{ $order->id }}}/fit/biceps" title=""><small>Change</small></a>
		</li>
	</ul>
</div>

<div class="large-4 medium-6 small-12 columns">
	<h3 class="thin left">Shipping Info</h3>
	<a href="#shipping-info" class="right underlined">Change</a>
	<div class="clearfix"></div>
	<ul class="no-bullet value-list left">
		<li><small class="list-key">Name</small>@{{ address.name }}</li>
		<li><small class="list-key">Email</small>{{{ $order->user->email }}}</li>
		<li><small class="list-key">Address 1</small> @{{ address.address1 }}</li>
		<li><small class="list-key">Address 2</small> @{{ address.address2 }}</li>
		<li><small class="list-key">City</small> @{{ address.city }}</li>
		<li><small class="list-key">Zip / Post Code</small> @{{ address.postcode }}</li>
		<li><small class="list-key">State / Province</small> @{{ address.province }}</li>
		<li><small class="list-key">Country</small> @{{ address.country }}</li>
	</ul>
</div>

<div class="large-4 medium-6 small-12 columns">
	<h3 class="thin left">Payment Info</h3>
	<a href="#payment-info" class="right underlined">Change</a>
	<div class="clearfix"></div>
	<ul class="no-bullet value-list left">
		<li><small class="list-key">Method</small>Credit</li>
		<li><small class="list-key">Card Type</small>@{{ card.brand }}</li>
		<li><small class="list-key">Card Number</small>@{{ card.last4 }}</li>
		<li><small class="list-key">Card Expiry</small>@{{ card.exp_month + "/" +  card.exp_year }}</li>
		<li><small class="list-key">Price </small>${{{ $order->jacket->price }}}	</li>
	</ul>
</div>