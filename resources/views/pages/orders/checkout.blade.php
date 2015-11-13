@extends('layouts/single-column')

@section('angular_page_controller')
	ng-controller="checkoutCtrl"
@stop

@section('title')
	{{{ $order->jacket->name }}}
@stop

@section('header')
	<h1 class="with-breadcrumbs">
	<a href="/orders/{{{ $order->id }}}" class="underlined">Your Order</a>
	<span class="chevron chevron--right breadcrumb-chevron"></span>
	<a href="/orders/{{{ $order->id }}}/look" class="underlined">Look</a>
	<span class="chevron chevron--right breadcrumb-chevron"></span>
	<a href="/orders/{{{ $order->id }}}/fit/height" class="underlined">Fit</a>
	<span class="chevron chevron--right breadcrumb-chevron"></span>
	Checkout
	</h1>
@stop

@section('main')
	<section id="address" class="checkout">
		<h2 class="left"><small>Please enter your</small> <br>Shipping Address</h2>
		<a ng-click="changeAddress()" ng-show="addressSubmitted" class="right underlined">Change</a>
		<div class="clearfix"></div>
		@include('partials.checkout.address-form')
	</section>
	<br ng-show="!addressSubmitted">
	<br ng-show="!addressSubmitted">

	<section ng-show="addressSubmitted" id="order-total">
		<h2>Order Total</h2>
		@include('partials.checkout.order-total')
	</section>

	<section class="animated fadeIn checkout" ng-show="addressSubmitted" id="payment-info">
		<h2 class="left"><small>Please enter your</small> <br>Payment Info</h2>
		<a ng-show="paymentInfoSubmitted" ng-click="changePaymentInfo()" class="right underlined">Change</a>
		<div class="clearfix"></div>
		@include('partials.checkout.credit-card-form')
	</section>

	<section ng-show="paymentInfoSubmitted" id="order-summary" class="checkout">
		<h2>Your Jacket</h2>
		@include('partials.checkout.order-summary')
	</section>

	<section class="text-center" ng-show="paymentInfoSubmitted">
		<form  action="/orders/{{{ $order->id}}}/process" method="POST">
			<input type="hidden" name="_token"         value="{!! csrf_token() !!}">
			<input type="hidden" name="stripe_token"   value="@{{ stripe_token }}">
			<input type="submit" class="button expand" value="Confirm &amp; Submit Order">
			<a href="/terms" class="under-button-link underlined">Terms Of Service</a>
		</form>
	</section>
@stop

@section('additional-scripts')
  <script src="https://js.stripe.com/v2/"></script>
@stop