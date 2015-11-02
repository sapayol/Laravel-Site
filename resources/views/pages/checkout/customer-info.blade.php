@extends('layouts/default')

@section('title')
	{{{ $order->jacket->name }}}
@stop

@section('angular_page_controller')
	ng-controller="checkoutCtrl"
@stop

@section('main')
	<div class="large-4 large-push-4 large-uncentered medium-centered medium-8 small-12 columns">
		<section id="address">
			<h2 class="text-center"><small>Please enter your</small> <br>Shipping Address</h2> <a ng-click="changeAddress()" class="right underlined show-for-large-up">Change</a>
			@include('partials.checkout.address-form')
		</section>
		<section ng-show="addressSubmitted" id="payment-info">
			<h2 class="text-center"><small>Please enter your</small> <br>Payment Info</h2> <a ng-click="changePaymentInfo()" class="right underlined show-for-large-up">Change</a>
			@include('partials.checkout.payment-info-form')
		</section>
	</div>

	<div class="large-4 large-pull-4 large-uncentered medium-centered medium-10 small-12 columns">
		<section ng-show="paymentInfoSubmitted" id="order-summary">
			<h2 class="text-center hide-for-large-up">Order Summary</h2>
			@include('partials.checkout.order-summary')
		</section>
	</div>
	<div class="clearfix"></div>
	<section class="large-6 medium-centered medium-8 small-12 columns text-center" ng-show="paymentInfoSubmitted">
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