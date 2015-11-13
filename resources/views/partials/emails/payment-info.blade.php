<h3 class="thin left">Payment Info</h3>
<br>
<ul class="value-list tight-list">
	<li>
		<small class="list-key">{{{ ucwords($order->jacket->model) }}}</small>
		<span class="list-value"><small>$ </small>&nbsp;{{{ $order->jacket->price }}}</span>
	</li>
	<li>
		<small class="list-key">Shipping</small>
		<span class="list-value"><small>$ </small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0.00</span>
	</li>
	<li>
		<small class="list-key">Taxes</small>
		<span class="list-value"><small>$ </small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0.00</span>
	</li>
	<li>
		<small class="list-key">Order Total</small>
		<span class="list-value"><strong><small>$ </small>&nbsp;{{{ $order->total }}}</strong></span>
	</li>
	<li>
		<br>
		<a href="https://dashboard.stripe.com/payments/{{{ $order->payment_id }}}" class="underlined">View Stripe Payment</a>
	</li>
</ul>