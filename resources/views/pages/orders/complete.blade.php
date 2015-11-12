@extends('layouts/default')

@section('title')
	{{{ $order->jacket->name }}}
@stop

@section('header')
	Your Placed Order
@stop

@section('main')

	<div class="small-12 medium-10 large-7 medium-centered columns">
		<section>
			<p>We&rsquo;re very excited that you&rsquo;ve decided to order a custom tailored BLEECKER from us.</p>
			<p>Within the next 24 hours we will reach out to you to go over your measurements and discuss your fit preferences before we start tailoring it.</p>
			<p>Let&rsquo;s make sure we have the right contact details from you:</p>
			<ul class="no-bullet value-list">
				<li><small class="list-key">Name</small><strong>{{{ $order->user->name }}}</strong></li>
				<li><small class="list-key">Email</small><strong>{{{ $order->user->email }}}</strong></li>
				<li><small class="list-key">Address</small><strong>{{{ $order->address->address1 }}}</strong></li>
				@if ($order->address->address2 )
					<li><small class="list-key">&nbsp;</small><strong>{{{ $order->address->address2 }}}</strong></li>
				@endif
				<li><small class="list-key">&nbsp;</small><strong>{{{ $order->address->city }}}, {{{ $order->address->province }}} {{{ $order->address->postcode }}}</strong></li>
				<li><small class="list-key">&nbsp;</small><strong>{{{ $order->address->country }}}</strong></li>
			</ul>
			<p>If this information is wrong or you have questions, write us at <a class="underlined" href="mailto:contact@sapayol.com">contact@sapayol.com</a>.</p>
		</section>

		<section>
			<h2>Order Details</h2>
			<ul class="no-bullet value-list">
				<li><small class="list-key">Order # </small><strong>{{{ $order->id  }}}	</strong></li>
				<li><small class="list-key">Placed On </small>{{{ date('M d, Y', strtotime($order->created_at))  }}}	</li>
			</ul>
			<img class="customization-image" src="/images/photos/jackets/{{{ $order->jacket->model }}}/hardware-{{{ $order->hardware_color()->name }}}.jpg" alt="Jacket Photo">

			<div class="large-6 medium-6 small-12 columns">
				<h3 class="thin">Look</h3>
				<ul class="no-bullet value-list">
					<li><small class="list-key">Model </small>{{{ $order->jacket->name  }}}	</li>
					<li><small class="list-key">Leather Type </small>{{{ ucfirst($order->leather_type()->name)  }}}	</li>
					<li><small class="list-key">Leather Color </small>{{{ ucfirst($order->leather_color()->name) }}}	</li>
					<li><small class="list-key">Lining Color </small>{{{ ucfirst($order->lining_color()->name) }}}	</li>
					<li><small class="list-key">Hardware Color </small>{{{ ucfirst($order->hardware_color()->name) }}}	</li>
				</ul>

				<h3 class="thin">Payment Info</h3>
				<ul class="no-bullet value-list">
					<li>
						<small class="list-key">{{{ $order->jacket->model }}}</small>
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
						<span class="list-value"><small>$ </small>&nbsp;{{{ $order->total }}}</span>
					</li>
					<li><small class="list-key">Payment Method</small>Credit</li>
				</ul>
			</div>

			<div class="large-6 medium-6 small-12 columns">
				<h3 class="thin">Fit</h3>
				@if ($order->bodyMeasurements->completed())
					<ul class="no-bullet value-list">
						@foreach ($order->bodyMeasurements->measurement_names as $name)
							@if ($name == 'note')
								<li><br></li>
							@endif
							<li>
								@if ($order->bodyMeasurements->$name)
									<small class="list-key">{{{ ucwords(str_replace('_', ' ', $name)) }}}</small>
									<span class="list-value">
										@if ($name == 'note')
											<em>{{{ $order->bodyMeasurements->$name }}}</em>
										@elseif ($order->bodyMeasurements->units == 'in')
											<strong decimal-to-fraction="{{{ $order->bodyMeasurements->$name }}}">{{{ $order->bodyMeasurements->$name }}}</strong> "
										@else
											<strong>{{{ $order->bodyMeasurements->$name != round($order->bodyMeasurements->$name) ?  round($order->bodyMeasurements->$name, 1) : round($order->bodyMeasurements->$name) }}}</strong> cm
										@endif
									</span>
								@endif
							</li>
						@endforeach
					</ul>
				@endif
				@if ($uncompleted_measurements = $order->bodyMeasurements->uncompleted())
					<div>
						<p class="alert-box alert">Looks like we still need the following measurements from you:</p>
						<ul class="text-left">
							@foreach ($uncompleted_measurements as $uncompleted_measurement)
								<li>{{{  ucwords(str_replace('_', ' ', $uncompleted_measurement)) }}}</li>
							@endforeach
						</ul>
					</div>
				@endif
			</div>
		<section>

		<div class="text-center">
			@if (!$order->bodyMeasurements->uncompleted())
				<a 	href="/jackets" class="button">Check out our other jackets</a>
			@else
				<a href="/orders/{{{ $order->id}}}/fit/{{{ array_shift($uncompleted_measurements) }}}" class="button expand-for-small hollow">Add Missing 	Measurements</a>
			@endif
				<br>
				<a href="mailto:contact@sapayol.com"  class="under-button-link underlined">Contact Us</a>
				<br><br>
		</div>
	</div>

@stop


@section('additional-scripts')
	<!-- Google Analytics E-Commerce Tracking -->
	<script>
		$(document).ready(function() {
			ga('require', 'ecommerce');

			ga('ecommerce:addTransaction', {
				'id':          '{{{ $order->id }}}',                          // Transaction ID. Required
				'affiliation': 'sapayol.com',                                 // Affiliation or store name
				'revenue':     "{{{ str_replace(',', '', $order->total) }}}", // Grand Total
				'shipping':    '0',                                           // Shipping
				'tax':         '0'                                            // Tax
			});

			ga('ecommerce:addItem', {
			  'id':       '{{{  $order->id }}}',                            // Transaction ID. Required.
			  'name':     '{{{  $order->jacket->name }}}',                  // Product name. Required.
			  'sku':      '{{{ $order->jacket->id }}}',                     // SKU/code.
			  'category': 'Jacket',                                         // Category or variation.
			  'price':    '{{{ $order->jacket->price }}}',                  // Unit price.
			  'quantity': '1'                                               // Quantity.
			});

			ga('ecommerce:send');
		});
	</script>
@stop
