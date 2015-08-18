<div class="large-4 medium-4 small-12 columns">
	<img class="checkout-image right responsive-image" src="/images/stock-photos/jacket-1.jpg">
</div>
<div class="large-4 medium-4 small-12 columns">
	<h3 class="text-center thin">Look</h3>
	<ul class="no-bullet value-list left">
		<li><small class="value-key">Jacket </small>{{{ $order->jacket->name }}}	</li>
		<li><small class="value-key">Leather Type </small>{{{ ucfirst($order->leather_type()->name)  }}}	</li>
		<li><small class="value-key">Leather Color </small>{{{ ucfirst($order->leather_color()->name) }}}	</li>
		<li><small class="value-key">Lining Color </small>{{{ ucfirst($order->lining_color()->name) }}}	</li>
		<li><small class="value-key">Hardware Color </small>{{{ ucfirst($order->hardware_color()->name) }}}	</li>
	</ul>
</div>

<div class="large-4 medium-4 small-12 columns">
	<h3 class="text-center thin">Fit</h3>
	<ul class="no-bullet value-list left">
		<li><small class="value-key">Your Height</small>{{{ $order->measurement->height}}} {{{ $order->measurement->units }}}</li>
		<li><small class="value-key">Half Shoulder</small>{{{ $order->measurement->half_shoulder}}} {{{ $order->measurement->units }}}</li>
		<li><small class="value-key">Back Width</small>{{{ $order->measurement->back_width}}} {{{ $order->measurement->units }}}</li>
		<li><small class="value-key">Chest</small>{{{ $order->measurement->chest}}} {{{ $order->measurement->units }}}</li>
		<li><small class="value-key">Belly / Stomach</small>{{{ $order->measurement->stomach}}} {{{ $order->measurement->units }}}</li>
		<li><small class="value-key">Back Length</small>{{{ $order->measurement->back_length}}} {{{ $order->measurement->units }}}</li>
		<li><small class="value-key">Waist</small>{{{ $order->measurement->waist}}} {{{ $order->measurement->units }}}</li>
		<li><small class="value-key">Arm</small>{{{ $order->measurement->arm}}} {{{ $order->measurement->units }}}</li>
		<li><small class="value-key">Biceps</small>{{{ $order->measurement->biceps}}} {{{ $order->measurement->units }}}</li>
	</ul>
</div>

<div class="large-4 medium-6 small-12 columns">
	<h3 class="text-center thin">Shipping Info</h3>
	<ul class="no-bullet value-list left">
		<li><small class="value-key">Name</small>@{{ address.name }}</li>
		<li><small class="value-key">Email</small>@{{ user.email }}</li>
		<li><small class="value-key">Address 1</small> @{{ address.address1 }}</li>
		<li><small class="value-key">Address 2</small> @{{ address.address2 }}</li>
		<li><small class="value-key">City</small> @{{ address.city }}</li>
		<li><small class="value-key">Zip / Post Code</small> @{{ address.postcode }}</li>
		<li><small class="value-key">State / Province</small> @{{ address.province }}</li>
		<li><small class="value-key">Country</small> @{{ address.country }}</li>
	</ul>
</div>

<div class="large-4 medium-6 small-12 columns">
	<h3 class="text-center thin">Payment Info</h3>
	<ul class="no-bullet value-list left">
		<li><small class="value-key">Method</small>Credit</li>
		<li><small class="value-key">Card Type</small>@{{ card.type }}</li>
		<li><small class="value-key">Card Number</small>@{{ card.number }}</li>
		<li><small class="value-key">Card Expiry</small>@{{ card.expiry }}</li>
		<li><small class="value-key">Price </small>${{{ $order->jacket->price }}}	</li>
	</ul>
</div>