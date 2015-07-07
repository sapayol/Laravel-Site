@extends('03-templates/default')

@section('title')
	{{{ $jacket->name }}}
@stop

@section('angular_page_controller')
	ng-controller="checkoutCtrl"
@stop

@section('main')
	<section class="large-12 medium-12 small-12 columns">
		<h2 class="text-center thin">Your Info</h2>
		@include('03-templates.checkout.user-info-form')
	</section>

	<section class="large-12 medium-12 small-12 columns" ng-show="userInfoSubmitted">
		<h2 class="text-center thin">Shipping Info</h2>
		@include('03-templates.checkout.shipping-info-form')
	</section>

	<section class="large-12 medium-12 small-12 columns" ng-show="shippingInfoSubmitted">
		<h2 class="text-center thin">Payment Info</h2>
		@include('03-templates.checkout.payment-info-form')
	</section>

	<section class="large-12 medium-12 small-12 columns" ng-show="checkoutStep == 4">
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

	<section class="large-12 medium-12 small-12 columns" ng-show="checkoutStep == 4">
		<a href="/jackets/{{{$jacket->model}}}/checkout/complete" class="button expand success">Order Now</a>
	</section>

@stop



