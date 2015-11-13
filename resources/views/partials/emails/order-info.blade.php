<h3>Order Info</h3>
<br>
<ul class="value-list tight-list">
	<li><small class="list-key">Order #</small><strong>{{{ $order->id }}}</strong></li>
	<li><small class="list-key">Name</small><strong>{{{ $order->user->name }}}</strong></li>
	<li><small class="list-key">Address</small></li>
	<li><strong>{{{ $order->address->address1 }}}</strong></li>
	@if ($order->address->address2 )
		<li><strong>{{{ $order->address->address2 }}}</strong></li>
	@endif
	<li><strong>{{{ $order->address->city }}}, {{{ $order->address->province }}} {{{ $order->address->postcode }}}</strong></li>
	<li><strong>{{{ $order->address->country }}}</strong></li>
</ul>