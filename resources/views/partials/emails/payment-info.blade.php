<?php
	$attribute_map = [
		"leather_color" => "Leather Color",
		"leather_type" => "Leather",
		"hardware_color" => "Hardware",
		"lining_color" => "Lining",
		"collar_color" => "Collar",
	];
?>

<h3 class="thin left">Payment Info</h3>
<br>
<ul style="list-style: none; margin-left: 0; padding-left: 0;">
	<li>
		<small style="font-size: 85%; display: inline-block; min-width: 65px;">{{{ ucwords($order->jacket->model) }}}</small>
		<span class="list-value"><small>$ </small>&nbsp;{{{ $order->jacket->price }}}</span>
	</li>
	@foreach ($order->attributes as $attribute)
		@if ($attribute->price !== '0.00' && $attribute->price !== null)
			<li>
				{{-- TODO - Make list key dynamic depending on attribute --}}
				<small class="list-key">{{{ $attribute_map[$attribute->type] }}}</small>
				<span class="list-value line-item-price">
					<span><small>$ </small>{{{ $attribute->price }}}</span>
				</span>
			</li>
		@endif
	@endforeach
	<li>
		<small style="font-size: 85%; display: inline-block; min-width: 65px;">Shipping</small>
		<span class="list-value"><small>$ </small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0.00</span>
	</li>
	<li>
		<small style="font-size: 85%; display: inline-block; min-width: 65px;">Taxes</small>
		<span class="list-value"><small>$ </small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;0.00</span>
	</li>
	<li>
		<small style="font-size: 85%; display: inline-block; min-width: 65px;">Order Total</small>
		<span class="list-value"><strong><small>$ </small>&nbsp;{{{ $order->total }}}</strong></span>
	</li>
</ul>