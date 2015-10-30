<form action="{{{ route('orders.update', $order->id) }}}" method="POST" class="animated fadeIn">
	<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
	<input type="hidden" name="_method" value="PATCH">
	<br>
	<label for="tracking-number" class="text-input-label">
		<span class="label-title">Tracking Number</span>
		<input type="text" name="tracking_number" id="tracking-number" required>
	</label>
		<button class="button small expand">Submit Tracking Number</button>
	<br>
</form>