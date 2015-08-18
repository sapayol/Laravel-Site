
@if ($action == 'pages.home')
  <div class="page-wrap on-home-page {{{ Auth::user() && Auth::user()->orders->count() > 0 ? 'with-existing-order' : '' }}}" ng-class="{descended: displayMenu}">
@elseif (strpos($action, 'jackets') !== false && $action != 'jackets.show')
  <div class="page-wrap on-jacket-page {{{ Auth::user() && Auth::user()->orders->count() > 0 ? 'with-existing-order' : '' }}}" ng-class="{descended: displayMenu}">
@else
  <div class="page-wrap {{{ Auth::user() && Auth::user()->orders->count() > 0 ? 'with-existing-order' : '' }}}" ng-class="{descended: displayMenu}">
@endif

<header class="row">
	<h1 class="page-title">
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
			{{{ $order->jacket->name  }}} - Fit
	  @endif
	</h1>
</header>