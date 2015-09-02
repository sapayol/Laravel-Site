<?php $action = Request::route()->getAction()['as'] ?>

<header class="row">
	<h1 class="page-title {{{ strpos($action,'orders') === 0 || $action === 'jackets.look'  || $action === 'jackets.show' ? 'with-breadcrumbs' : '' }}}">
	  @if ($action == 'pages.who-we-are')
			<a ng-click="displayMenu = false">Who We Are</a>
		@elseif ($action == 'pages.how-it-works')
			<a ng-click="displayMenu = false">How It Works</a>
		@elseif ($action == 'pages.our-leather')
			<a ng-click="displayMenu = false">Our Leather</a>
		@elseif ($action == 'pages.terms')
			<a ng-click="displayMenu = false">Terms of Service</a>
		@elseif ($action == 'jackets.index')
			<a ng-click="displayMenu = false">Tailored Jackets</a>
		@elseif ($action == 'jackets.look' || $action == 'jackets.show')
			<a href="/jackets" class="underlined">Tailored Jackets</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			{{{ $jacket->name }}}
		@elseif ($action == 'orders.show')
		  My Jacket
		@elseif ($action == 'orders.fit')
			<a href="/orders/{{{ $order->id }}}" class="underlined">My Jacket</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			<a href="/orders/{{{ $order->id }}}/look" class="underlined">Look</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			Fit
			<span class="chevron chevron--right breadcrumb-chevron"></span>
		  {{{ str_replace('_', ' ', $step) }}}
		@elseif ($action == 'orders.checkout')
			<a href="/orders/{{{ $order->id }}}" class="underlined">My Jacket</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			<a href="/orders/{{{ $order->id }}}/look" class="underlined">Look</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			<a href="/orders/{{{ $order->id }}}/fit/height" class="underlined">Fit</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			Checkout
	  @endif
	</h1>
</header>

@if (Session::has('message'))
	<div class="row">
		<div class="alert-box alert" data-alert>
    	{{ Session::get('message') }}
    	<a href="#" class="close">&times;</a>
		</div>
	</div>
@endif