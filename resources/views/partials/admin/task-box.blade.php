<nav ng-hide="trackingInfo || tailorNote"  >
	@if ($order->statusIsBefore('production'))
		@if ($order->bodyMeasurements->uncompleted())
			<form action="{{{ route('orders.update', $order->id) }}}" method="POST" onsubmit="return confirm('Looks like there are still missing measurements, are you sure you want to send to production?');">
		@else
			<form action="{{{ route('orders.update', $order->id) }}}" method="POST">
		@endif
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
			<input type="hidden" name="_method" value="PATCH">
			<input type="hidden" name="status" value="production">
			<input type="submit" class="button expand small" value="Start Production">
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
