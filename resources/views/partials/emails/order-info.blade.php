<h3>Order Info</h3>
<br>
<ul style="list-style: none; margin-left: 0; padding-left: 0;">
	<li><small style="font-size: 85%; display: inline-block; min-width: 65px;">Order #</small><strong>{{{ $order->id }}}</strong></li>
	<li><small style="font-size: 85%; display: inline-block; min-width: 65px;">Name</small><strong>{{{ $order->user->name }}}</strong></li>
	<li><small style="font-size: 85%; display: inline-block; min-width: 65px;">Address</small></li>
	<li><strong>{{{ $order->address->address1 }}}</strong></li>
	@if ($order->address->address2 )
		<li><strong>{{{ $order->address->address2 }}}</strong></li>
	@endif
	<li><strong>{{{ $order->address->city }}}, {{{ $order->address->province }}} {{{ $order->address->postcode }}}</strong></li>
	<li><strong>{{{ $order->address->country }}}</strong></li>
</ul>