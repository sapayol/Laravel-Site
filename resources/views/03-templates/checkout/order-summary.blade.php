<div class="row collapse order-summary">
	<div class="large-4 medium-4 small-12 columns">
		<img class="checkout-image right responsive-image" src="/images/stock-photos/jacket-1.jpg">
	</div>
	<div class="large-4 medium-4 small-12 columns">
		<h3 class="thin left">Look</h3>
		<a href="/jackets/{{{ $order->jacket->model }}}/look" class="right underlined">Change</a>
		<div class="clearfix"></div>
		<ul class="no-bullet value-list left">
			<li><small class="list-key">Jacket </small><strong>{{{ $order->jacket->name }}}	</strong></li>
			<li><small class="list-key">Leather Type </small><strong>{{{ ucfirst($order->leather_type()->name)  }}}	</strong></li>
			<li><small class="list-key">Leather Color </small><strong>{{{ ucfirst($order->leather_color()->name) }}}	</strong></li>
			<li><small class="list-key">Lining Color </small><strong>{{{ ucfirst($order->lining_color()->name) }}}	</strong></li>
			<li><small class="list-key">Hardware Color </small><strong>{{{ ucfirst($order->hardware_color()->name) }}}	</strong></li>
		</ul>
	</div>

	<div class="large-4 medium-4 small-12 columns">
		<h3 class="thin left">Fit</h3>
		<div class="clearfix"></div>
		<ul class="no-bullet value-list left">
			<li>
				<small class="list-key">Your Height</small>
				<span  class="list-value"><strong>{{{ $order->userMeasurements->height}}}</strong> {{{ $order->userMeasurements->units }}}</span>
				<a class="underlined" href="/orders/{{{ $order->id }}}/fit/height" title=""><small>Change</small></a>
			</li>
			<li>
				<small class="list-key">Half Shoulder</small>
				<span  class="list-value"><strong>{{{ $order->userMeasurements->half_shoulder}}}</strong> {{{ $order->userMeasurements->units }}}</span>
				<a class="underlined" href="/orders/{{{ $order->id }}}/fit/half_shoulder" title=""><small>Change</small></a>
			</li>
			<li>
				<small class="list-key">Back Width</small>
				<span  class="list-value"><strong>{{{ $order->userMeasurements->back_width}}}</strong> {{{ $order->userMeasurements->units }}}</span>
				<a class="underlined" href="/orders/{{{ $order->id }}}/fit/back_width" title=""><small>Change</small></a>
			</li>
			<li>
				<small class="list-key">Chest</small>
				<span  class="list-value"><strong>{{{ $order->userMeasurements->chest}}}</strong> {{{ $order->userMeasurements->units }}}</span>
				<a class="underlined" href="/orders/{{{ $order->id }}}/fit/chest" title=""><small>Change</small></a>
			</li>
			<li>
				<small class="list-key">Belly / Stomach</small>
				<span  class="list-value"><strong>{{{ $order->userMeasurements->stomach}}}</strong> {{{ $order->userMeasurements->units }}}</span>
				<a class="underlined" href="/orders/{{{ $order->id }}}/fit/stomach" title=""><small>Change</small></a>
			</li>
			<li>
				<small class="list-key">Back Length</small>
				<span  class="list-value"><strong>{{{ $order->userMeasurements->back_length}}}</strong> {{{ $order->userMeasurements->units }}}</span>
				<a class="underlined" href="/orders/{{{ $order->id }}}/fit/back_length" title=""><small>Change</small></a>
			</li>
			<li>
				<small class="list-key">Waist</small>
				<span  class="list-value"><strong>{{{ $order->userMeasurements->waist}}}</strong> {{{ $order->userMeasurements->units }}}</span>
				<a class="underlined" href="/orders/{{{ $order->id }}}/fit/waist" title=""><small>Change</small></a>
			</li>
			<li>
				<small class="list-key">Arm</small>
				<span  class="list-value"><strong>{{{ $order->userMeasurements->arm}}}</strong> {{{ $order->userMeasurements->units }}}</span>
				<a class="underlined" href="/orders/{{{ $order->id }}}/fit/arm" title=""><small>Change</small></a>
			</li>
			<li>
				<small class="list-key">Biceps</small>
				<span  class="list-value"><strong>{{{ $order->userMeasurements->biceps}}}</strong> {{{ $order->userMeasurements->units }}}</span>
				<a class="underlined" href="/orders/{{{ $order->id }}}/fit/biceps" title=""><small>Change</small></a>
			</li>
			<li><br></li>
			<li>
				<small class="list-key">Note</small>
				<span  class="list-value">&nbsp;</span>
				<a class="underlined" href="/orders/{{{ $order->id }}}/fit/note" title=""><small>Change</small></a>
				<span  class="list-value"><em>{{{ $order->userMeasurements->note}}}</em></span>
			</li>
		</ul>
	</div>

	<div class="large-4 medium-6 small-12 columns">
		<h3 class="thin left">Shipping Info</h3>
		<a ng-click="changeAddress()" class="right underlined">Change</a>
		<div class="clearfix"></div>
		<ul class="no-bullet value-list left">
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
		<ul class="no-bullet value-list left">
			<li><small class="list-key">Method</small><strong>Credit</strong></li>
			<li><small class="list-key">Card Type</small><strong>@{{ card.brand }}</strong></li>
			<li><small class="list-key">Card Number</small><strong>@{{ card.last4 }}</strong></li>
			<li><small class="list-key">Expiration</small><strong>@{{ card.exp_month + "/" +  card.exp_year }}</strong></li>
			<li><small class="list-key">Total </small><strong>${{{ $order->jacket->price }}}	</strong></li>
		</ul>
	</div>
</div>