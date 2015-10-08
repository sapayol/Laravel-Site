<?php $action = Request::route() !== null ? Request::route()->getAction()['as'] : null ?>
<?php $uri = Request::route()->getUri(); ?>

<header class="row">
	<h1 class="page-title {{{ ((strpos($action,'orders') === 0 || strpos($action, 'fit') === 0)&& $action != 'orders.complete') || $action === 'jackets.look'  || $action === 'jackets.show' ? 'with-breadcrumbs' : '' }}}">
	  @if ($action == 'pages.who-we-are')
			<a ng-click="displayMenu = false">Who We Are</a>
		@elseif ($action == 'pages.how-it-works')
			<a ng-click="displayMenu = false">How It Works</a>
		@elseif ($action == 'pages.our-leather')
			<a ng-click="displayMenu = false">Our Leather</a>
		@elseif ($action == 'pages.terms')
			<a ng-click="displayMenu = false">Terms of Service</a>
		@elseif ($action == 'users.show')
			<a ng-click="displayMenu = false">Your Profile</a>
		@elseif (strpos($uri, 'login'))
			<a ng-click="displayMenu = false">Login</a>
		@elseif (strpos($uri, 'reset'))
			<a ng-click="displayMenu = false">Password Reset</a>
		@elseif ($action == 'jackets.index')
			<a ng-click="displayMenu = false">Our Jackets</a>
		@elseif ($action == 'jackets.show')
			<a href="/jackets" class="underlined">Our Jackets</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			{{{ $jacket->name }}}
		@elseif ($action == 'jackets.look')
			<a href="/jackets" class="underlined">Our Jackets</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			<a href="/jackets/{{{ $jacket->name }}}" class="underlined">{{{ $jacket->name }}}</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
		  Look
		@elseif ($action == 'orders.show')
		  Your Order
		@elseif ($action == 'fit.next' || $action == 'fit.show')
			<a href="/orders/{{{ $order->id }}}" class="underlined">Your Order</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			<a href="/orders/{{{ $order->id }}}/look" class="underlined">Look</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			Fit
			<span class="chevron chevron--right breadcrumb-chevron"></span>
		  {{{ str_replace('_', ' ', $step) }}}
		@elseif ($action == 'orders.checkout')
			<a href="/orders/{{{ $order->id }}}" class="underlined">Your Order</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			<a href="/orders/{{{ $order->id }}}/look" class="underlined">Look</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			<a href="/orders/{{{ $order->id }}}/fit/height" class="underlined">Fit</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			Checkout
		@elseif ($action == 'orders.complete')
			Checkout Complete!
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