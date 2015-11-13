@extends('layouts/default')

@section('title')
	Fit | Units
@stop

@section('header')
	<h1 class="with-breadcrumbs">
			<a href="/orders/{{{ $order->id }}}" class="underlined">Your Order</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			@if ($order && $order->statusIsAfter('started'))
				Look
			@else
				<a href="/orders/{{{ $order->id }}}/look" class="underlined">Look</a>
			@endif
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			Fit
			<span class="chevron chevron--right breadcrumb-chevron"></span>
		  Units
	</h1>
@stop

@section('main')
	<section class="large-6 medium-10 small-12 columns large-centered medium-centered">
		<p>
			We will walk you through every measurement we need to fit your {{{ $order->jacket->name }}} to your body. It&rsquo;s very simple.
			<br><br>
			All you need is a tape measure.
		</p>
		<ul>
			<li>Don’t wear anything thicker than an undershirt or tight t-shirt.</li>
			<li>Enter measurements as a decimal. For example: 39.3 (not 39 &frac14; or 39,3)</li>
		</ul>
		<p><em>It&rsquo;s much easier and more accurate if a friend helps you.</em></p>
	</section>

	<section class="large-6 medium-10 small-12 columns large-centered medium-centered text-center">
		<p class="text-left"><strong>Will you be measuring in inches or centimeters?</strong></p>
		<form action="/orders/{{{ $order->id }}}/fit" method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
			<input type="hidden" name="measurements[units]" value="in"/>
			<button type="submit" class="black button expand">Inches</button>
		</form>

		<p>or</p>

		<form action="/orders/{{{ $order->id }}}/fit" method="POST">
			<input type="hidden" name="_token" value="{{{ csrf_token() }}}">
			<input type="hidden" name="measurements[units]" value="cm"/>
			<button type="submit" class="black button expand">Centimeters</button>
		</form>
	</section>
@stop




