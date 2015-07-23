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
		@elseif ($action == 'jackets.fit')
			@yield('title') - Fit
	  @endif
	</h1>
</header>