@extends('03-templates/default')

@section('title')
	{{{ $jacket->name }}}
@stop

@section('main')
	<section class="large-12 medium-12 small-12 columns">
		<h2 class="text-center thin">Shipping Info</h2>
		<form action="">
			<label for="">Address 1
				<input type="text">
			</label>
			<label for="">Address 2
				<input type="text">
			</label>
			<label for="">City
				<input type="text">
			</label>
			<label for="">Province / State
				<input type="text">
			</label>
			<label for="">Postcode
				<input type="text">
			</label>
			<label for="">Country
				<input type="text">
			</label>
		</form>
	</section>

	<section class="large-12 medium-12 small-12 columns">
		<h2 class="text-center thin">Payment Info</h2>
		<form action="">
			<label for="">Credit Card Number
				<input type="text">
			</label>
			<label for="">Expiration
				<input type="text">
			</label>
			<label for="">CVC <small><a class="underlined" href="">What's This?</a></small>
				<input type="text">
			</label>
		</form>
	</section>

	<section class="large-12 medium-12 small-12 columns">
		<h2 class="text-center thin">Summary</h2>
		<br>
		<ul class="no-bullet value-list left">
			<li><small class="value-key">Jacket </small>{{{ $jacket->name }}}	</li>
			<li><small class="value-key">Leather Type </small>{{{ $leather_type }}}	</li>
			<li><small class="value-key">Leather Color </small>{{{ $leather_color }}}	</li>
			<li><small class="value-key">Lining Color </small>{{{ $lining_color }}}	</li>
			<li><small class="value-key">Hardware Color </small>{{{ $hardware_color }}}	</li>
			<li><small class="value-key">Price </small>${{{ $jacket->price }}}	</li>
		</ul>
		<img class="checkout-image right" src="/images/photos/jacket-1.jpg">
	</section>

	<section class="large-12 medium-12 small-12 columns">
		<a href="/jackets/{{{$jacket->model}}}/checkout/complete" class="button expand success">Order Now</a>
	</section>

@stop



