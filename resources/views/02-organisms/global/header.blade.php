
@if ($action == 'pages.home')
  <div class="page-wrap on-home-page {{{ Auth::user() && Auth::user()->orders->count() > 0 ? 'with-existing-order' : '' }}}" ng-class="{descended: displayMenu}">
@elseif (strpos($action, 'jackets') !== false && $action != 'jackets.show')
  <div class="page-wrap on-jacket-page {{{ Auth::user() && Auth::user()->orders->count() > 0 ? 'with-existing-order' : '' }}}" ng-class="{descended: displayMenu}">
@else
  <div class="page-wrap {{{ Auth::user() && Auth::user()->orders->count() > 0 ? 'with-existing-order' : '' }}}" ng-class="{descended: displayMenu}">
@endif


<header class="row">
	<h1 class="page-title {{{  $action == 'orders.fit' || $action == 'orders.checkout' || $action == 'orders.complete' ? 'with-breadcrumbs' : '' }}}">
		<?php $action = Request::route()->getAction()['as'] ?>
	  @if ($action == 'pages.who-we-are')
			Who We Are
		@elseif ($action == 'pages.how-it-works')
			How It Works
		@elseif ($action == 'jackets.show')
		  Tailored Jackets
		@elseif ($action == 'jackets.look')
			@yield('title')
		@elseif ($action == 'orders.fit')
			<a href="/orders/{{{ $order->id }}}" class="underlined">My Order</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			<a href="/jackets/{{{ $order->jacket->model }}}/look" class="underlined">Look</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			{{-- <a href="/orders/{{{ $order->id }}}/fit/units" class="underlined">Fit</a> --}}
			Fit
			{{-- <span class="chevron chevron--right breadcrumb-chevron"></span> --}}
			<span class="chevron chevron--right breadcrumb-chevron"></span>
		  {{{ str_replace('_', ' ', $step) }}}
		@elseif ($action == 'orders.checkout')
			<a href="/orders/{{{ $order->id }}}" class="underlined">My Order</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			<a href="/jackets/{{{ $order->jacket->model }}}/look" class="underlined">Look</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			<a href="/orders/{{{ $order->id }}}/fit/height" class="underlined">Fit</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			Checkout
	  @endif
	</h1>
</header>