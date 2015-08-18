@extends('03-templates/default')

@section('title')
	{{{ $order->jacket->name }}}
@stop

@section('angular_page_controller')
	ng-controller="checkoutCtrl"
@stop

@section('main')
{{-- 	<section class="large-12 medium-12 small-12 columns" id="user-info">
		<h2 class="text-center thin">Your Info</h2>
		@include('03-templates.checkout.user-info-form')
	</section> --}}

	<section class="large-12 medium-12 small-12 columns" id="shipping-info">
		<h2 class="text-center thin">Shipping Address</h2>
		@include('03-templates.checkout.shipping-info-form')
	</section>

	<section class="large-12 medium-12 small-12 columns" ng-show="shippingInfoSubmitted" id="payment-info">
		<h2 class="text-center thin">Payment Info</h2>
		@include('03-templates.checkout.payment-info-form')
	</section>

	<section ng-show="paymentInfoSubmitted">
		<h2 class="text-center thin">Summary</h2>
		@include('03-templates.checkout.order-summary')
	</section>

	<section class="large-12 medium-12 small-12 columns" ng-show="paymentInfoSubmitted">
		<form action="/orders/{{{ $order->id}}}/process" method="POST">
			<input type="hidden" name="_token"         value="{!! csrf_token() !!}">
			<input type="hidden" name="stripe_token"   value="@{{ stripe_token }}">
			<input type="submit" class="button expand" value="Confirm &amp; Submit Order">
		</form>
	</section>
@stop