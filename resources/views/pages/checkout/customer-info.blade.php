@extends('layouts/default')

@section('title')
	{{{ $order->jacket->name }}}
@stop

@section('angular_page_controller')
	ng-controller="checkoutCtrl"
@stop

@section('main')
	<section class="large-12 medium-12 small-12 columns" id="address">
		<h2 class="text-center thin"><small>Please enter your</small> <br>Shipping Address</h2>
		@include('03-organisms.checkout.address-form')
	</section>

	<section class="large-12 medium-12 small-12 columns inverted-colors" ng-show="addressSubmitted" id="payment-info">
		<h2 class="text-center thin">Payment Info</h2>
		@include('03-organisms.checkout.payment-info-form')
	</section>

	<section class="large-12 medium-12 small-12 columns"  ng-show="paymentInfoSubmitted" id="order-summary">
		<h2 class="text-center thin">Order Summary</h2>
		@include('03-organisms.checkout.order-summary')
	</section>

	<section class="large-12 medium-12 small-12 columns" ng-show="paymentInfoSubmitted">
		<form action="/orders/{{{ $order->id}}}/process" method="POST">
			<input type="hidden" name="_token"         value="{!! csrf_token() !!}">
			<input type="hidden" name="stripe_token"   value="@{{ stripe_token }}">
			<input type="submit" class="button expand" value="Confirm &amp; Submit Order">
			<a href="/terms" class="under-button-link">Terms Of Service</a>
		</form>
	</section>
@stop