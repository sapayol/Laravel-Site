<header class="row">
	<h1 class="page-title {{{ strpos($action,'orders') === 0 || $action === 'jackets.look' ? 'with-breadcrumbs' : '' }}}">
		<?php $action = Request::route()->getAction()['as'] ?>
	  @if ($action == 'pages.who-we-are')
			Who We Are
		@elseif ($action == 'pages.how-it-works')
			How It Works
		@elseif ($action == 'pages.our-leather')
			Our Leather
		@elseif ($action == 'jackets.index')
			Tailored Jackets
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
			{{-- <a href="/orders/{{{ $order->id }}}/fit/units" class="underlined">Fit</a> --}}
			Fit
			{{-- <span class="chevron chevron--right breadcrumb-chevron"></span> --}}
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