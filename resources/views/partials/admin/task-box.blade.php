<nav ng-hide="trackingInfo || tailorNote"  >
	@if ($order->statusIsBefore('production'))
		<form action="{{{ route('orders.update', $order->id) }}}" method="POST" onsubmit="return confirm('Are you sure you want to send to production?');">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
			<input type="hidden" name="_method" value="PATCH">
			<input type="hidden" name="status" value="production">
			<input type="submit" class="button expand small" value="Start Production">
		</form>
		<form action="{{{ route('admin.confirm-order', $order->id) }}}" method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
			<input type="submit" class="button expand primary-color small" value="Send Confirmation Email">
		</form>
	@endif
	@if ($order->statusIsBefore('shipped') && $order->statusIsAfter('paid'))
		<a href="" class="button expand small" ng-click="trackingInfo = true; taskMode = true; focus('tracking-number');">Add Tracking Number</a>
	@endif
	@if ($order->status == ('shipped'))
		<form action="{{{ route('orders.update', $order->id) }}}" method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
			<input type="hidden" name="_method" value="PATCH">
			<input type="hidden" name="status" value="completed">
			<input type="submit" class="button expand small" value="Complete Order">
		</form>
	@endif
	<a href="" class="button expand small primary-color" ng-click="tailorNote = true; taskMode = true;">Email Tailor</a>
	<a href="https://dashboard.stripe.com/payments/{{{ $order->payment_id }}}" target="_blank" class="button expand small  primary-color">View Stripe Payment</a>
</nav>

