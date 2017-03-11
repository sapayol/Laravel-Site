@extends('layouts/wide-single-column')

@section('title')
Your Order
@stop

@section("page_wrap_class")
	show-order-page
@stop

@section('header')
  Your Order
@stop

@section('main')

	<div class="text-center">
		<br><br>
		<p>We have almost everything we need to create your {{{ $order->jacket->name }}}</p>
	</div>


	@include('partials.jacket.look')

	<div class="clearfix"></div>

	@if ($order->bodyMeasurements->completed())
		@include('partials.measurement.tracker')
	@endif


	<section class="large-8 medium-7 medium-centered columns">
		<a href="/orders/{{{ $order->id }}}/fit/next" class="button expand">Finish Your Order</a>
		<div class="text-center">or</div>
		<br>
		<form action="/orders/{{{ $order->id }}}/reset" method="POST">
			<input type="hidden" name="_token"                      value="{{{ csrf_token() }}}">
			<input type="hidden" name="_method"                     value="PATCH">
			<input type="hidden" name="user_id"                     value="{{{ $new_order['user_id'] }}}">
			<input type="hidden" name="model"                       value="{{{ $new_order['model'] }}}">
			<input type="hidden" name="jacket_look[leather_type]"   value="{{{ $new_order['jacket_look']['leather_type'] }}}">
			<input type="hidden" name="jacket_look[leather_color]"  value="{{{ $new_order['jacket_look']['leather_color'] }}}">
			<input type="hidden" name="jacket_look[lining_color]"   value="{{{ $new_order['jacket_look']['lining_color'] }}}">
			<input type="hidden" name="jacket_look[hardware_color]" value="{{{ $new_order['jacket_look']['hardware_color'] }}}">
			<input type="submit" class="button expand hollow"       value="Start a New Order">
			<label for="retain_measurements">
				<input type="checkbox" name="retain_measurements" id="retain_measurements" checked="true">
				Use the measurements from my last order
			</label>
		</form>
	</section>
@stop