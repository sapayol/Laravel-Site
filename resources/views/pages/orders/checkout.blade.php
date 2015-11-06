@extends('layouts/default')

@section('title')
	{{{ $order->jacket->name }}}
@stop

@section('angular_page_controller')
	ng-controller="checkoutCtrl"
@stop

@section('main')

<div class="small-12 medium-8 large-5 large-offset-1 medium-centered large-uncentered columns">
	<section class="checkout-form" id="address">
		<h2 class="left"><small>Please enter your</small> <br>Shipping Address</h2>
		<a ng-click="changeAddress()" ng-show="addressSubmitted" class="right underlined">Change</a>
		<div class="clearfix"></div>
		@include('partials.checkout.address-form')
	</section>

	<section class="checkout-form animated fadeIn" ng-show="addressSubmitted" id="payment-info">
		<h2 class="left"><small>Please enter your</small> <br>Payment Info</h2>
		<a ng-show="paymentInfoSubmitted" ng-click="changePaymentInfo()" class="right underlined">Change</a>
		<div class="clearfix"></div>
		@include('partials.checkout.payment-info-form')
	</section>
</div>


<section class="small-12 medium-8 large-4 large-offset-1 medium-centered large-uncentered columns" ng-show="paymentInfoSubmitted" id="order-summary">
	@include('partials.checkout.order-summary')
</section>

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