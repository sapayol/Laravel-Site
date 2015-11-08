@extends('layouts/default')

@section('title')
	{{{ $order->jacket->name }}}
@stop

@section('angular_page_controller')
	ng-controller="checkoutCtrl"
@stop

@section('main')

<div class="small-12 medium-8 large-6 large-offset-3 columns">
	<section class="checkout-form" id="address">
		<h2 class="left"><small>Please enter your</small> <br>Shipping Address</h2>
		<a ng-click="changeAddress()" ng-show="addressSubmitted" class="right underlined">Change</a>
		<div class="clearfix"></div>
		@include('partials.checkout.address-form')
	</section>
	<section class="checkout-form animated fadeIn" ng-show="addressSubmitted" id="payment-info">
		<h2>Order Total</h2>
		<ul class="no-bullet value-list tight-list">
			<li>
				<small class="list-key">{{{ $order->jacket->model }}}</small>
				<span class="list-value"><small>$ </small>&nbsp;{{{ $order->jacket->price }}}</span>
			</li>
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
		<br>
		<h2 class="left"><small>Please enter your</small> <br>Payment Info</h2>
		<a ng-show="paymentInfoSubmitted" ng-click="changePaymentInfo()" class="right underlined">Change</a>
		<div class="clearfix"></div>
		@include('partials.checkout.payment-info-form')
	</section>
</div>
<div class="clearfix"></div>

<div class="small-12 medium-8 large-6 large-offset-3 columns" ng-show="paymentInfoSubmitted" id="order-summary">
	<section class="stick-to-bottom">
		<h2>Your Jacket</h2>
		@include('partials.checkout.order-summary')
	</section>
</div>

<div class="clearfix"></div>
<section class="small-12  medium-8 large-6 medium-centered columns text-center" ng-show="paymentInfoSubmitted">
	<form  action="/orders/{{{ $order->id}}}/process" method="POST">
		<input type="hidden" name="_token"         value="{!! csrf_token() !!}">
		<input type="hidden" name="stripe_token"   value="@{{ stripe_token }}">
		<input type="submit" class="button expand" value="Confirm &amp; Submit Order">
		<a href="/terms" class="under-button-link underlined">Terms Of Service</a>
	</form>
</section>


@stop

@section('additional-scripts')
		{{-- <link rel="dns-prefetch" href="//js.stripe.com" /> --}}
    <script src="https://js.stripe.com/v2/"></script>
@stop