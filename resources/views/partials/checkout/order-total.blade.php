<ul class="no-bullet value-list tight-list">
	<li>
		<small class="list-key">{{{ $order->jacket->model }}}</small>
		<span class="list-value"><small>$ </small>&nbsp;{{{ $order->jacket->price }}}</span>
	</li>
	@foreach ($order->attributes as $attribute)
		@if ($attribute->price !== '0.00')
			<li>
				{{-- TODO - Make list key dynamic depending on attribute --}}
				<small class="list-key">Collar</small>
				<span class="list-value"><small>$ </small>&nbsp;&nbsp;&nbsp;{{{ $attribute->price }}}</span>
			</li>
		@endif
	@endforeach
	<li>
		<small class="list-key">Shipping</small>
		<span class="list-value"><small>$ </small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0.00 <small><em>Free shipping worldwide</em></small></span>
	</li>
	<li>
		<small class="list-key">Taxes</small>
		<span class="list-value"><small>$ </small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0.00 <small><em>Taxes and duties included</em></small></span>
	</li>
	<li>
		<small class="list-key"><strong>Order Total</strong></small>
		<strong class="list-value"><small>$ </small>{{{ $order->total }}}</strong>
	</li>
</ul>