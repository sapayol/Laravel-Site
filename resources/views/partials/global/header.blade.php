<header class="row">
	<h1 class="page-title {{{ ((strpos($action,'orders') === 0 || strpos($action, 'fit') === 0) && $action != 'orders.complete' && $action != 'orders.show') || $action === 'jackets.look'  || $action === 'jackets.show' ? 'with-breadcrumbs' : '' }}}">
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
		@elseif (strpos($current_uri, 'login'))
			<a ng-click="displayMenu = false">Login</a>
		@elseif (strpos($current_uri, 'register'))
			<a ng-click="displayMenu = false">Register</a>
		@elseif (strpos($current_uri, 'reset'))
			<a ng-click="displayMenu = false">Password Reset</a>
		@elseif ($action == 'jackets.index')
			<a ng-click="displayMenu = false">Our Jackets</a>
		@elseif ($action == 'admin.order-index')
			<a ng-click="displayMenu = false">{{{ $status ? ucfirst($status) : 'All' }}} Orders</a>  ({{{ $orders->total() }}})
		@elseif ($action == 'admin.dashboard')
			<a ng-click="displayMenu = false">Dashboard</a>
		@elseif ($action == 'admin.show-order')
			<a ng-click="displayMenu = false">Order: {{{ $order->id }}}</a>
		@elseif ($action == 'admin.edit-order')
			<a ng-click="displayMenu = false">Edit Order: {{{ $order->id }}}</a>
		@elseif ($action == 'orders.show')
		  Your Order
		@elseif ($action == 'jackets.show')
			<a href="/jackets" class="underlined">Our Jackets</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			{{{ $jacket->name }}}
		@elseif ($action == 'orders.look' || $action == 'jackets.look')
			<a href="/jackets" class="underlined">Our Jackets</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			<a href="/jackets/{{{ $jacket->model }}}" class="underlined">{{{ $jacket->name }}}</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
		  Look
		@elseif ($action == 'fit.next' || $action == 'fit.show')
			<a href="/orders/{{{ $order->id }}}" class="underlined">Your Order</a>
			<span class="chevron chevron--right breadcrumb-chevron"></span>
			@if ($order && !$order->isNew())
				Look
			@else
				<a href="/orders/{{{ $order->id }}}/look" class="underlined">Look</a>
			@endif
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
			Your Placed Order
	  @endif
	</h1>
</header>